import React, { useRef, useEffect } from "react";
import * as d3 from "d3";

const Chart = ({ data }) => {
         const svgRef = useRef();

         useEffect(() => {
                  d3.select(svgRef.current).selectAll("*").remove();

                  const width = 600;
                  const height = 300;
                  const margin = { top: 20, right: 30, bottom: 30, left: 50 };

                  const svg = d3
                           .select(svgRef.current)
                           .attr("width", width)
                           .attr("height", height);

                  const chartArea = svg
                           .append("g")
                           .attr("transform", `translate(${margin.left},${margin.top})`);

                  const innerWidth = width - margin.left - margin.right;
                  const innerHeight = height - margin.top - margin.bottom;

                  const isMulti = Array.isArray(data[0][1]);

                  const yValues = isMulti
                           ? data.flatMap(d => d[1]).filter(v => v !== null)
                           : data.map(d => d[1]).filter(v => v !== null);

                  const xScale = d3
                           .scaleLinear()
                           .domain(d3.extent(data, d => d[0]))
                           .range([0, innerWidth]);

                  const yScale = d3
                           .scaleLinear()
                           .domain(d3.extent(yValues))
                           .range([innerHeight, 0]);

                  chartArea
                           .append("g")
                           .attr("transform", `translate(0, ${innerHeight})`)
                           .call(d3.axisBottom(xScale));

                  chartArea.append("g").call(d3.axisLeft(yScale));

                  if (!isMulti) {
                           const line = d3
                                    .line()
                                    .defined(d => d[1] !== null)
                                    .x(d => xScale(d[0]))
                                    .y(d => yScale(d[1]));

                           chartArea
                                    .append("path")
                                    .datum(data)
                                    .attr("fill", "none")
                                    .attr("stroke", "steelblue")
                                    .attr("stroke-width", 2)
                                    .attr("d", line);
                  }

                  else {
                           const colors = ["blue", "green", "red"];

                           [0, 1, 2].forEach(i => {
                                    const line = d3
                                             .line()
                                             .defined(d => d[1][i] !== null)
                                             .x(d => xScale(d[0]))
                                             .y(d => yScale(d[1][i]));

                                    chartArea
                                             .append("path")
                                             .datum(data)
                                             .attr("fill", "none")
                                             .attr("stroke", colors[i])
                                             .attr("stroke-width", 2)
                                             .attr("d", line);
                           });
                  }
         }, [data]);

         return <svg ref={svgRef}></svg>;
};

export default Chart;
