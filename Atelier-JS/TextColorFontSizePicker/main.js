const parag=document.querySelector('.para');
document.getElementById('container').addEventListener("change",
    (e)=>{
        console.log(e.target)
        console.log(parag)
    parag.style[e.target.id]=
        e.target.id=="font-size"?e.target.value +"px":e.target.value
    }
    )