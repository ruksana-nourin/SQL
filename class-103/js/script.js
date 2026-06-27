// console.log("Connected")
//let text = $("input").val("Isdb");
//console.log(text);
// $("input").val();

// $("button").click(function () {
//     $("h5").text($('input').val());
// });
// $("input").keyup(function () {
//     $("h5").text($('input').val());
// });





// document.querySelector("button").addEventListener("click", function (){
//     document.querySelector("h5").innerHTML = document.querySelector("input").value;

   
// });
// document.querySelector("button").addEventListener("", function (){
//     document.querySelector("h5").innerHTML = document.querySelector("input").value;

   
// });

   // ------form----------
//    #$("selector").event(function(){});


// $("form").submit(function (e) {
//     e.preventDefault();
//     let inputValue = $('input').val();
//     if(inputValue ==""){
//         $("small").text("Enter a value first.").css("color","red");
//     }else{
//         $("small").text("");
//         this.submit();
//         alert("Form Submitted")

//     }
// });



// #$("selector").on("event",function(){});


$("form").on("submit",function (e) {
    e.preventDefault();
    let inputValue = $('input').val();
    if(inputValue ==""){
        $("small").text("Enter a value first.").css("color","red");
    }else{
        $("small").text("");
        this.submit();
        alert("Form Submitted")

    }
});


// $("selector").event(function(){});
// $("selector").on("event",function(){});
