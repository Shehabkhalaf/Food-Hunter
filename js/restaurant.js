// Get Data Restaurant 
let dataRest = JSON.parse(localStorage.getItem("dataRest"));

// Get Elements 
document.getElementById("imgLogo").src = dataRest.logo;
document.getElementById("status").innerHTML = dataRest.status;
document.getElementById("nameRest").innerHTML = dataRest.name;
document.getElementById("minorder").innerHTML = dataRest.minorder;
document.getElementById("time").innerHTML = dataRest.time + " Mins";
document.getElementById("fees").innerHTML = dataRest.fees + " L.E";
document.getElementById("open").innerHTML = dataRest.open;
document.getElementById("close").innerHTML = dataRest.close;
document.getElementById("name").innerHTML  = dataRest.name + " ";
document.getElementById("description").innerHTML = dataRest.description;





fetch(`http://localhost/footer-hunter/implementation/getMeals.php?partnerid=${dataRest.id}`)
.then(res=>res.json())
.then(dataAll=>{
    dataAll.forEach(data=>{
        console.log(data)
        let div = document.createElement("div")
        div.setAttribute("class","col-lg-3 col-md-6 mt-3")
        div.innerHTML = `  
        <div class="dish text-center">
            <img src=${data.image}  alt="">
            <p>${data.mealname}</p>
        </div>
        `
        document.getElementById("dishes").append(div);
    })
})








let data = [
    {
        "star": 5,
        "count": 180,
    },
    {
        "star": 4,
        "count": 80,
    },
    {
        "star": 3,
        "count": 38,
    },
    {
        "star": 2,
        "count": 20,
    },
    {
        "star": 1,
        "count": 0,
    },

]

let total_rating = 0,
    rating_based_on_stars = 0;

data.forEach(rating => {
    total_rating += rating.count;
    rating_based_on_stars += rating.count * rating.star;
})

data.forEach(rating => {
    let rating_progress = `
        <div class="rating_progress-value d-flex justify-content-evenly align-items-center">
        <p>${rating.star} <span class="star">&#9733;</span></p>
        <div class="progress">
            <div class="bar" style="width:${(rating.count / total_rating) * 100}%"></div>
        </div>
        <p>${rating.count.toLocaleString()}</p>
        </div>
    `
    document.querySelector(".rating_progress").innerHTML += rating_progress

})

let rating_average = (rating_based_on_stars / total_rating ).toFixed(1);

document.querySelector(".rating_average h1").innerHTML =rating_average;
document.querySelector(".rating_average p").innerHTML = total_rating.toLocaleString();
document.querySelector(".star-inner").style.width = (rating_average / 5) * 100 + "%";