<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ali</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-lg font-bold">Ali Ibrahim</h1>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">About</a></li>
                <li><a href="#" class="hover:underline">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">User List</h2>
        
        <!-- Highlight Button  -->
        <button id="highlight-btn" class="mb-4 px-4 py-2 bg-green-500 text-white rounded-md">
            Highlight Admins
        </button>

        <!-- Table  -->
        <div class="bg-white p-6 shadow-md rounded-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Name</th>
                        <th class="border border-gray-300 p-2">Email</th>
                        <th class="border border-gray-300 p-2">Role</th>
                    </tr>
                </thead>
                <tbody id="user-table">
                </tbody>
            </table>
        </div>
    </div>

    <script>

        // fetch data
        document.addEventListener("DOMContentLoaded", () => {
            fetch("/users.json")
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("user-table");
                    data.forEach(user => {
                        let row = `<tr class="border border-gray-300">
                            <td class="p-2 text-center">${user.id}</td>
                            <td class="p-2 text-center">${user.name}</td>
                            <td class="p-2 text-center">${user.email}</td>
                            <td class="p-2 text-center role">${user.role}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error("Error loading Users:", error));
        });

        // Highlight Button
        document.getElementById("highlight-btn").addEventListener("click", () => {
            document.querySelectorAll("tbody tr").forEach(row => {
                const role = row.querySelector(".role").innerText;
                if (role === "Admin") {
                    row.classList.toggle("bg-red-300");
                }
            });
        });
    </script>

</body>
</html>
