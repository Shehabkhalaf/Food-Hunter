// Get Element Name Partner
let namePartner = document.getElementById("namePartner");

// Call Data From Local Storage
let partnerData = JSON.parse(localStorage.getItem("dataPartner"))

// Add Name Partner
namePartner.innerHTML = partnerData.name + " " + `<i class="fa-solid fa-shop"></i>`;

// Get Elements Form 
let foodName = document.getElementById("foodname"),
    description = document.getElementById("description"),
    price = document.getElementById("price"),
    submit = document.getElementById("submit"),
    fileInput = document.querySelector('input[type="file"]');



// Add Event Listner

submit.addEventListener('submit', function (e) {
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('id', partnerData.id);
    formData.append('image', file);
    formData.append('mealname', foodName.value);
    formData.append('description', description.value);
    formData.append('price', price.value);


    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/footer-hunter/implementation/addMeal.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('تم تحميل الصورة بنجاح.');
        } else {
            console.log('فشل تحميل الصورة.');
        }
    };
    xhr.send(formData);
});

// Create Function Add Foods in Dom
function addFoods() {
    fetch(`http://localhost/footer-hunter/implementation/getMeals.php?partnerid=${+partnerData.id}`)
        .then(res => res.json())
        .then((data) => {
            console.log(data)
            data.forEach(element => {
                let tr = document.createElement("tr");
                tr.setAttribute("id", element.mealid);
                tr.innerHTML = `
                            <th scope="row">${element.mealname}</th>
                            <td>${element.description}</td>
                            <td><img src=${element.image} alt=""></td>
                            <td>${element.price}</td>
                            <td>
                                <button class="delete me-2"  data-id=${element.mealid}>delete</button>
                                <button class="edit" data-id=${element.mealid} data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                                aria-controls="offcanvasExample">edit</button>
                            </td>
        `
                document.querySelector("tbody").append(tr)
            });
            // Delete Food
            // Call Button Delete
            let deleteFoods = document.querySelectorAll(".delete");
            deleteFoods.forEach(deletef => {
                deletef.addEventListener("click", (e) => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(deletef.getAttribute("data-id")).remove();
                            deleteFood(deletef.getAttribute("data-id"));
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                })
            })

            // Edit Food
            let editFoods = document.querySelectorAll(".edit");
            editFoods.forEach(editFood => {
                editFood.addEventListener("click", () => {
                    editFoodFunc(data.filter(element=>element.mealid === editFood.getAttribute("data-id")))
                })
            })

        })
}


function deleteFood(id) {
    const formData = new FormData();
    formData.append('mealid', id);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/footer-hunter/implementation/deletemeal.php', true);
    xhr.send(formData);
}


function editFoodFunc(data) {
    let foodnameUpdateData = document.getElementById("foodnameUpdateData"),
        descriptionUpdateData = document.getElementById("descriptionUpdateData"),
        priceUpdateData = document.getElementById("priceUpdateData"),
        submitUpdateData = document.getElementById("submitUpdateData"),
        formFileUpdateData = document.getElementById('formFileUpdateData');

        foodnameUpdateData.value = data[0].mealname;
        descriptionUpdateData.value = data[0].description;
        priceUpdateData.value = data[0].price;

        submitUpdateData.addEventListener('submit', function (e) {
            const file = formFileUpdateData.files[0];
            const formData = new FormData();
            formData.append('mealid', data[0].mealid);
            formData.append('image', file);
            formData.append('mealname', foodnameUpdateData.value);
            formData.append('description', descriptionUpdateData.value);
            formData.append('price', priceUpdateData.value);
            
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/footer-hunter/implementation/updateMeal.php', true);
        
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log('تم تحميل الصورة بنجاح.');
                } else {
                    console.log('فشل تحميل الصورة.');
                }
            };
            xhr.send(formData);
        });
}

// Call Function Add Foods 
addFoods();
