document.addEventListener("DOMContentLoaded", () => {
    // Change background based on time of day
    const hour = new Date().getHours();
    document.body.style.backgroundColor =
      hour >= 7 && hour < 12
        ? "#FFFAE5" // Morning: light yellow
        : hour >= 12 && hour < 16
        ? "#E6F7FF" // Afternoon: light blue
        : "#2C2C54"; // Evening/Night: dark blue
    document.body.style.color = hour >= 16 ? "white" : "black";
  
    // Open modal
    document.getElementById("modal").style.display = "flex";
  });
  
  // Change images periodically
  let imageIndex = 1;
let intervalId = null;

function setImageInterval() {
  const intervalInput = document.getElementById("interval-input").value;
  if (intervalInput && intervalInput > 0) {
    // Конвертуємо секунди в мілісекунди для використання в setInterval
    const intervalInMilliseconds = parseInt(intervalInput, 10) * 1000;

    intervalId = setInterval(() => {
      imageIndex = (imageIndex % 3) + 1; // Assuming 3 images (image1.jpg, image2.jpg, image3.jpg)
      document.getElementById("dynamic-image").src = `image${imageIndex}.jpg`;
    }, intervalInMilliseconds);

    document.getElementById("modal").style.display = "none";
  } else {
    alert("Введіть дозволений інтервал у секундах!");
  }
}

  
  // Generate 10x10 table with random numbers
  function generateTable() {
    const minValue = parseInt(document.getElementById("min-значення").value, 10);
    const maxValue = parseInt(document.getElementById("max-значення").value, 10);
  
    if (isNaN(minValue) || isNaN(maxValue) || minValue >= maxValue) {
      alert("Будь ласка, введіть дійсні значення min і max!");
      return;
    }
  
    const table = document.getElementById("dynamic-table");
    table.innerHTML = "";
  
    for (let i = 0; i < 10; i++) {
      const row = document.createElement("tr");
      for (let j = 0; j < 10; j++) {
        const cell = document.createElement("td");
        cell.textContent = Math.floor(Math.random() * (maxValue - minValue + 1)) + minValue;
        cell.className = (i + j) % 2 === 0 ? "light" : "dark";
        row.appendChild(cell);
      }
      table.appendChild(row);
    }
  }
  