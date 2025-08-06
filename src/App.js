import React, { useEffect, useState } from "react";
import Chart from "./components/Chart";

const App = () => {
  const [charts, setCharts] = useState([]);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetch("/data.json")
      .then((res) => {
        if (!res.ok) throw new Error("Failed to load data.json");
        return res.json();
      })
      .then(setCharts)
      .catch((err) => setError(err.message));
  }, []);

  if (error) return <div style={{ color: "red" }}>{error}</div>;

  return (
    <main style={{ padding: "2rem" }}>
      <h1 style={{ fontSize: "2rem", marginBottom: "1rem" }}>D3 Chart Viewer</h1>
      {charts.map((chart, i) => (
        <section key={i} style={{ marginBottom: "3rem" }}>
          <h2 style={{ marginBottom: "0.5rem" }}>{chart.title}</h2>
          <Chart data={chart.data} />
        </section>
      ))}
    </main>
  );
};

export default App;
