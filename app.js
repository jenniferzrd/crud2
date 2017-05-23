var app = (function app() {
  "use strict";
  // alert("coucou");
  var btn, observer, list, li, input, removeLi, remove, i, checkbox, up, down, upAction, downAction, upBtn, downBtn, btnSave, save;


  window.onload = function() {
    input = byId("input");
    btn = byId("create_li");
    remove = byId("remove_li");
    btn.onclick = observer;
    remove.onclick = removeLi;
    upBtn = document.querySelectorAll('.haut');
    downBtn = document.querySelectorAll('.bas');
    list = document.getElementById('list');
    save = document.getElementById('save_li');
    save.onclick = btnSave;
  };

  observer = function observer() {
    li = document.createElement("li");
    list.appendChild(li);
    li.innerHTML = input.value;
    checkbox = document.createElement('input');
    checkbox.type = "checkbox";
    li.appendChild(checkbox);
    up = document.createElement("i");
    up.classList.add("fa" , "fa-caret-up" , "haut");
    down = document.createElement("i");
    down.classList.add("fa" , "fa-caret-down" , "bas");
    up.onclick = upAction;
    down.onclick = downAction;
    li.appendChild(up);
    li.appendChild(down);

  };

  removeLi = function removeLi () {
    // var mesLis = document.getElementsByTagName('');
    var ligneRemove = document.querySelectorAll("input:checked");
    // console.log(ligneRemove);
    if (ligneRemove.length === 0) {
      alert("veuillez cocher un élement");
    }
    else {
      for (i=0; i< ligneRemove.length; i++){
        ligneRemove[i].parentElement.remove();
      }
    }

  };

  upAction = function upAction(evt) {
    var ul, li;
    li = this.parentElement;
    ul = li.parentElement;
    console.log(li);
    console.log("click");
    if (li.previousElementSibling){
      ul.insertBefore(li, li.previousElementSibling);
    }
  };

  downAction = function downAction(evt) {
    var ul, li;
    li = this.parentElement;
    ul = li.parentElement;
    console.log(li);
    console.log("click");
    if (li.nextElementSibling){
      ul.insertBefore(li, li.nextElementSibling.nextSibling);
    }
  };


  btnSave = function btnSave() {
    var saveLi = document.querySelectorAll("input:checked");
    if (saveLi.lenght === 0) {
      alert("veuillez cocher un élement"); }
      else { for (i=0; i< saveLi.length; i++){
    postViaAjax2();
    }
  }
};

  function postViaAjax2() {
    var xhr, form;
    xhr = new XMLHttpRequest();
    form = new FormData();

    form.append("title", "titre test");
    xhr.open("post", "api.php");
    xhr.onload = function getResponse(evt) {
      log(evt);
    };
    xhr.send(form);
  }



}());


// var app = (function app () {
//   "use strict";
// var btn, createLi, handleClick, input, list;
// window.onload = function start() {
//   input = byId("li_name");
//   list = byId("my_list");
//   btnAdd = byId("li_create");
// btnDel= byId("li_delete")
//
// };
//   windows.onkeypress = function checkkey(e) {
//     if (document.activeElement === input &&
// e.key === "Enter" ) {
//   handleClick();
// }
//   };
// }());



// CORRECTION
// var list = (function list() {
//   "use strict";
// var btn, inp, handler, createItem, list, btnDel, checkbox, deleteItem, moveItem;
// window.onload = function() {
// btn = byId("btn");
// btnDel = byid("del");
// inp = byId("inp");
// list = byId("list");
// log("ready");
// btn.onclick = handler;
// };
//
// handler = function handler() {
//   if (input.value.length === 0) {
//     alert("champ vide");
//   } else {
//     createItem(inp.value);
//   }
// };

// createItem = function createItem(param) {
//   var li = document.createElement("li");
// log(li);
// li = classList.add("item");
// li.textContent = param;
// list.appendChild(li);
// checkbox = document.createElement("input");
// checkbox.type = "checkbox";
// };

// deleteItem = function deleteItem() {
// var i, check = document.querySelectorAll("input:checked");
// log(check);
//   log("delete ok"
// if (check.lenght === 0) {
//   alert("veuillez cocher");
// } else {
// for (i=0, i< check.length; i+=1) {
//  check[i].parentElement.remove();
// log(check[i]);
// }

// moveItem = function moveItem() {
//   var bro, li;
//   li = this.parentElement;
//   if (this.classList.contains("haut")) {
//     bro = li.previousElementSibling;
//     if(bro) {
//       list.insertBefore(li, bro);
//     }
//   } else {
//     bro = li.nextElementSibling;
// if(bro) {
//       list.insertBefore(li, bro);
//     }
//   }
//   log("bro");
// };
// };
// };

// list();
// }());
