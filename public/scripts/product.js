document.addEventListener('DOMContentLoaded',function() {

    var plus = document.getElementById("plus");
    var moins = document.getElementById("moins");
    var resultat = document.getElementById("numb");
    let grande_image=  document.querySelector(".product-images img");
    let petite_images =  document.querySelectorAll(".product-miniatures img");
    var i = 1;
    const maxo = 5;
    resultat.innerText=1;
    plus.addEventListener("click", function () {
        i += 1;
        resultat.innerText = i;

        if (i >= maxo) {
            i=maxo;
            resultat.innerText = i;
            document.getElementById('msgerreur').style.visibility = 'visible';
           // document.getElementsByClassName('box error').style.display= 'block';
        }
    })

    moins.addEventListener("click", function () {
        i -= 1;
        resultat.innerText = i;


        if (i <= 1) {
            i = 1;
            resultat.innerText = i;

        }
        if(document.getElementById('msgerreur').style.visibility === 'visible'){
                document.getElementById('msgerreur').style.visibility = 'hidden';
            }

    })

    petite_images.forEach( image =>{
        image.addEventListener('click',function () {
            grande_image.src = image.src
        })

    })


})