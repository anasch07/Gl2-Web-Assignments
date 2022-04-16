let colorList = document.querySelector("[name=colorList]");

function getNewLine(){
    // RGB
    const randomColor = [
        Math.floor(Math.random() * 255),
        Math.floor(Math.random() * 255),
        Math.floor(Math.random() * 255)
    ];
    const hexColor = randomColor[0].toString(16) + randomColor[1].toString(16) + randomColor[2].toString(16);

    let li = document.createElement("li");
    li.className = "d-flex align-items-center justify-content-between clickable";
    li.classList.add("list-inline-item");
    let colorDiv = document.createElement("div");
    colorDiv.innerHTML = "Hex: #" + hexColor;
    li.style.color = "#"+hexColor;

    let delIcon = document.createElement("div");
    delIcon.innerHTML = '<svg class="clickable" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg>';
    delIcon.addEventListener(
        "click",
        ()=>{
            colorList.removeChild(li);
        }
    )

    li.appendChild(colorDiv);
    li.appendChild(delIcon);

    li.addEventListener(
        "click",
        ()=>{
            const randomColor = [
                Math.floor(Math.random() * 255),
                Math.floor(Math.random() * 255),
                Math.floor(Math.random() * 255)
            ];
            const hexColor = randomColor[0].toString(16) + randomColor[1].toString(16) + randomColor[2].toString(16);

            colorDiv.innerHTML = "Hex: #" + hexColor;
            li.style.color = "#"+hexColor;
        }
    )
    return li;
}

document.getElementsByClassName("addIcon")[0].addEventListener(
    "click",
    ()=>{
        colorList.appendChild(getNewLine());
    }
)

colorList.appendChild(getNewLine());
colorList.appendChild(getNewLine());
colorList.appendChild(getNewLine());