// Get Element
let boxes = document.getElementById("boxes");
let iconSearch = document.getElementById("iconSearch");
let search = document.getElementById("search");


iconSearch.addEventListener("click", (e) => {
    search.value = "";
    showRestaurants("all")
})

search.addEventListener("input",(e) =>{
    showRestaurants(e.target.value)

})


// Add Restaurants in Dom

function showRestaurants(rest = "all") {
    boxes.innerHTML = "";
    fetch("http://localhost/footer-hunter/implementation/getAllpartners.php")
        .then(res => res.json())
        .then(dataAll => {
            if (rest === "all") {
                dataAll.forEach(data => {
                    let div = document.createElement("div");
                    div.setAttribute("class", "col-lg-3 col-md-6  mt-3")
                    div.innerHTML = `
                            <a class="link" href="./resraurant.html" id=${data.id}>
                                <div class="box">
                                    <img src=${data.logo} alt="">
                                    <h5 class="name">${data.name}</h5>
                                    <p class="description">${data.category}</p>
                                </div>
                            </a>    
                            `
                    boxes.append(div);
                });
            } else {
                dataAll.forEach(data => {
                    if (data.name.toUpperCase().includes(rest.toUpperCase())) {
                        let div = document.createElement("div");
                        div.setAttribute("class", "col-lg-3 col-md-6  mt-3")
                        div.innerHTML = `
                                <a class="link" href="./resraurant.html" id=${data.id}>
                                    <div class="box">
                                        <img src=${data.logo} alt="">
                                        <h5 class="name">${data.name}</h5>
                                        <p class="description">${data.category}</p>
                                    </div>
                                </a>    
                                `
                        boxes.append(div);
                    }
                });
            }


            let links = document.querySelectorAll(".link");
            links.forEach(link => {
                link.addEventListener("click", (e) => {
                    dataAll.forEach(data => {
                        if (+data.id === +link.getAttribute("id")) {
                            localStorage.setItem("dataRest", JSON.stringify(data));
                        }
                    })
                })
            })
        })
}

showRestaurants();