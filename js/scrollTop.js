// const btnonTop = document.querySelector("#ontop");

// window.addEventListener("scroll", function () {
//     if(window.pageYOffset > 100){
//         onTop.classList.add("active");
//     }
//     else{
//         onTop.classList.remove("active");
//     }
// })

// btnonTop.addEventListener("click", function(){
//     window.scrollTo({
//         top: 0,
//         left: 0,
//         behavior: "smooth"
//     });
// });

window.onscroll = function(){
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop){
        document.getElementById("ontop").style.display="block";
    }
    else{
        document.getElementById("ontop").style.display = "none";
    }
}

function scrollToTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}