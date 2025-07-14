function cleanUpForm() {
    document.getElementById("productName").value = "";
    document.getElementById("productPrice").value = "";
    document.getElementById("category").value = "";
    document.getElementById("productImage").value = "";
}

function toggleModal() {
    const modal = document.getElementById("add-product-modal");
    modal.classList.remove("opacity-0", "pointer-events-none");
}

function closeModal() {
    const modal = document.getElementById("add-product-modal");
    modal.classList.add("opacity-0", "pointer-events-none");
    cleanUpForm();
}

function handleSubmit(event) {
    event.preventDefault();
    const productName = document.getElementById("productName").value;
    const productPrice = document.getElementById("productPrice").value;
    const category = document.getElementById("category").value;
    const productImage = document.getElementById("productImage").files[0];

    const formData = new FormData();
    formData.append("productName", productName);
    formData.append("productPrice", productPrice);
    formData.append("category", category);
    formData.append("productImage", productImage);

    fetch("/api/addProduct.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Product added successfully!");
            } else {
                alert("Failed to add product: " + data.error);
            }
        })
        .catch((error) => {
            alert("An error occurred while adding the product.");
        })
        .finally(() => {
            cleanUpForm();
            closeModal();
        });
}

const addProductButton = document.getElementById("add-product");
addProductButton.addEventListener("click", toggleModal);

const closeButton = document.getElementById("close-btn");
closeButton.addEventListener("click", closeModal);

const submitButton = document.getElementById("submit-btn");
submitButton.addEventListener("click", handleSubmit);
