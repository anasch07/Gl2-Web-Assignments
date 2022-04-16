const todoObjectTable = [];



class Todo_Class {
    constructor(item){
        this.ulElement =item;
    } 

    add() {
        const todoInput = document.querySelector("#myInput").value;
        if (todoInput == "") {
            alert("You did not enter any item!") 
        } else {
            const todoObject = {
                id : todoObjectTable.length,
                todoText : todoInput,
                isDone : false,
            }

        todoObjectTable.unshift(todoObject);
        this.display();
        document.querySelector("#myInput").value = '';

        }
    }

    done_undone(x) {
        const selectedTodoIndex = todoObjectTable.findIndex((item)=> item.id == x);
        console.log(todoObjectTable[selectedTodoIndex].isDone);
        todoObjectTable[selectedTodoIndex].isDone == false ? todoObjectTable[selectedTodoIndex].isDone = true : todoObjectTable[selectedTodoIndex].isDone = false;
        this.display();
    }

    deleteElement(z) {
        const selectedDelIndex = todoObjectTable.findIndex((item)=> item.id == z);

        todoObjectTable.splice(selectedDelIndex,1);

        this.display();
    }


    display() {
        this.ulElement.innerHTML = "";

        todoObjectTable.forEach((object_item) => {

            const newLiElement = document.createElement("li");
            const delBtn = document.createElement("i");
            newLiElement.classList.add("list-group-item");
            newLiElement.innerText = object_item.todoText;
            newLiElement.setAttribute("data-id", object_item.id);

            delBtn.setAttribute("data-id", object_item.id);
            delBtn.classList.add("far", "fa-trash-alt");

            newLiElement.appendChild(delBtn);
            
            delBtn.addEventListener("click", function(e) {
                const deleteId = e.target.getAttribute("data-id");
                myTodoList.deleteElement(deleteId);
            })
            
            newLiElement.addEventListener("click", function(e) {
                const selectedId = e.target.getAttribute("data-id");
                myTodoList.done_undone(selectedId);
            })

            if (object_item.isDone) {
                newLiElement.classList.add("checked");
            }

            this.ulElement.appendChild(newLiElement);
        })
    }
} 


//MAIN

const listSection = document.querySelector("#myUL");

myTodoList = new Todo_Class(listSection);
document.querySelector(".addBtn").addEventListener("click", function() {
    myTodoList.add()
})






