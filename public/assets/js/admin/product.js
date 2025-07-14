function deleteProduct(productId) {
    if (confirm("Are you sure you want to delete this product?")) {
        fetch(`/api/deleteProduct.php?id=${productId}`, {
            method: "DELETE",
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    alert("Product deleted successfully!");
                    getData();
                } else {
                    alert("Failed to delete product: " + data.error);
                }
            })
            .catch((error) => {
                console.error("Error deleting product:", error);
                alert("An error occurred while deleting the product.");
            });
    }
}

const tableBody = document.getElementById("product-list");

const getData = () => {
    const basePath = "/assets/";
    fetch("/api/getProducts.php")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            tableBody.innerHTML = "";
            data.forEach((product) => {
                const row = document.createElement("tr");
                row.innerHTML = `
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td>${product.category}</td>
                <td class="flex justify-center items-center">
                  <img src="${basePath}${product.image}" alt="${product.name}" style="width: 80px; height: 80px;">
                </td>
                <td>
                    <button class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600 transition-color duration-300" onclick="deleteProduct(${product.id})">Delete</button>
                </td>
            `;
                row.classList.add("bg-white", "border-b", "text-center");
                tableBody.appendChild(row);
            });
        })
        .catch((error) => {
            console.error("Error fetching products:", error);
            tableBody.innerHTML =
                "<tr><td colspan='5'>Error loading products</td></tr>";
        });
};

getData();
