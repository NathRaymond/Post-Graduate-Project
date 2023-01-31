const addBtn = document.querySelector(".add");

const input = document.querySelector(".inp-group");

function removeInput(){
    this.parentElement.remove();
}

function addInput(){

    const subject = document.createElement("select");
    subject.type = "text";
    subject.style = "width:50%";
    subject.placeholder = "enter your subject";

    const grade = document.createElement("input");
    grade.type = "text";
    grade.style = "width:50%";
    grade.placeholder = "enter your grade";

    const btn = document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex = document.createElement("div");
    flex.className = "flex";

    input.appendChild(flex);
    flex.appendChild(subject);
    flex.appendChild(grade);
    flex.appendChild(btn);

}

addBtn.addEventListener("click", addInput)