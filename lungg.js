document
  .getElementById("detection-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const imageInput = document.getElementById("imageUpload");
    const patientData = {
      smoking: document.getElementById("smoking").checked,
      yellowFingers: document.getElementById("yellowFingers").checked,
      allergy: document.getElementById("allergy").checked,
      alcoholConsuming: document.getElementById("alcoholConsuming").checked,
      coughing: document.getElementById("coughing").checked,
      chestPain: document.getElementById("chestPain").checked,
    };

    const resultDiv = document.getElementById("result");

    // Simulate cancer detection
    const isCancerDetected = simulateDetection(
      imageInput.files[0],
      patientData
    );

    resultDiv.textContent = isCancerDetected
      ? "Cancer Detected! If you're concerned about a health problem, it's important to seek professional advice as soon as possible. Our team of experienced doctors is available to discuss your symptoms and help guide you through the next steps."
      : "No Cancer Detected! Prioritize your well-being, rest, and healthy habits to stay strong throughout your journey.";
  });

// Simulated detection function
function simulateDetection(imageFile, patientData) {
  const conditionsMet = Object.values(patientData).filter(
    (value) => value
  ).length;

  // If at least 2 conditions are met, it's an early stage of cancer
  if (conditionsMet >= 2) {
    return true; // Cancer detected (early stage)
  }

  // Randomly simulate cancer detection based on the image (for demonstration purposes)
  return Math.random() < 0.2; // Adjust the probability for the image detection
}
