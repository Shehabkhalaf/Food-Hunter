// Get Data Restaurant 
let dataRest = JSON.parse(localStorage.getItem("dataPartner"));

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