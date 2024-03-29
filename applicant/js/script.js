var courseInput = document.getElementById("course");
var departmentInput = document.getElementById("department");

function updateContent() {
    var courseInputValue = courseInput.value.trim();
    var departmentInputValue = departmentInput.value.trim();
    var url = "search_request.php?course=" + courseInputValue + "&department=" + departmentInputValue;
    fetch(url)
        .then(response => {
            if (!response.ok) { // Check if the response is ok
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            var tbody = document.getElementById("tbody");
            tbody.innerHTML = ""; // clear the tbody
            data.forEach(item => {
                const row = document.createElement('tr');
                for (const key in item) {
                    if (item.hasOwnProperty(key)) {
                        const cell = document.createElement('td');
                        if (key == "requirement") {
                            cell.innerHTML = `<button><a href='requirement.php?id=` + item['id'] + `'>Requirements/Details</a></button>`
                            row.appendChild(cell);
                        } else if (key == "description") {
                            cell.innerHTML = `<button><a href='login.php?=` + item['id'] + `'>Apply</a></button>`
                            row.appendChild(cell);

                        } else {
                            cell.textContent = item[key];
                            row.appendChild(cell);
                        }

                    }
                }
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

courseInput.addEventListener("input", updateContent);
departmentInput.addEventListener("input", updateContent);