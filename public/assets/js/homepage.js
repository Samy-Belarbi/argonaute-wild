"use strict";

const adjectives = ["Chanceux", "Maladroit", "Beau", "Sensible", "Fort", "Sage"];
const form = document.querySelector("form");
const select = document.getElementById("adjective-list");

const main = async () => {
    insertAdjectives();
    await refreshArgonautList();
    form.addEventListener("submit", (event) => checkForm(event));
}

// Fonction qui ajoute tous les adjectifs en fonction du tableau au dessus
const insertAdjectives = () => {

    adjectives.forEach(adjective => {
        const optionValue = document.createElement("option");
        optionValue.innerText = adjective;
        optionValue.value = adjective;
        select.appendChild(optionValue);
    })
}

// Fonction qui vérifie si les inputs sont valides avant de l'envoyer, sinon affichage d'erreurs
const checkForm = async (e) => {
    e.preventDefault();
    const input = document.getElementById("argonaute-name");
    deleteAllErrors();

    if (checkInput(input.value) && checkSelect(select.value)) {

        const arrayValues = [input.value, select.value];
        await insertInDb(arrayValues);
    }
}

// CHECKERS
const checkInput = (value) => {
    if (/^[A-Za-z0-9]*$/.test(value) && value.length < 15 && value.length > 0) {
        return true;
    } else {
        displayInputError();
    };
}

const displayInputError = () => {
    const input = document.getElementById("argonaute-name");
    const inputParent = input.parentNode;
    input.classList.add("shake");
    setTimeout(() => input.classList.remove("shake"), 1000);
    const p = returnPError("Veuillez insérer un nom inférieur à 15 caractères, sans caractères spéciaux ou accents.");
    inputParent.insertBefore(p, input.nextElementSibling);
}

const deleteAllErrors = () => {
    const ps = form.querySelectorAll(".error");
    ps.forEach(p => {
        p.remove();
    })
}

const checkSelect = (value) => {
    if (adjectives.includes(value)) {
        return true;
    } else {
        displaySelectError();
    };
}

const displaySelectError = () => {
    select.classList.add("shake");
    const selectParent = select.parentNode;
    setTimeout(() => select.classList.remove("shake"), 1000);
    const p = returnPError("Veuillez sélectionner un adjectif.");
    selectParent.insertBefore(p, select.nextElementSibling);
}

const returnPError = (message) => {
    const p = document.createElement("p");
    p.innerText = message;
    p.classList.add("error");

    return p;
}

// INSERT EN DB
const insertInDb = async (array) => {

    const argonaut = createObjectArgonaut(array);

    const formData = new FormData();
    formData.append("Argonaute", JSON.stringify(argonaut));

    fetch('index.php/addargonaut', {
        method: "post",
        body: formData
    })
    .then(response => response.text())
    .then(refreshArgonautList())
    .catch(error => console.error(error));

}

const createObjectArgonaut = (array) => {
    return {
        name: array[0],
        adjective: array[1]
    }
}

const refreshArgonautList = async () => {
    clearList();

    const ul = document.querySelector(".list");

    const dataArgonauts = await getArgonauts();

    if (dataArgonauts !== null) {
        dataArgonauts.forEach(argonaut => {
            const li = document.createElement("li");
    
            const divMember = document.createElement("div");
            divMember.classList.add("member");
            divMember.id = argonaut.ID;
            li.appendChild(divMember);
    
            const divArgonaute = document.createElement("div");
            divArgonaute.classList.add("argonaute");
            divMember.appendChild(divArgonaute);
    
            const pName = document.createElement("p");
            pName.innerText = argonaut.Firstname;
            divArgonaute.appendChild(pName);
    
            const divAdjective = document.createElement("div");
            divAdjective.classList.add("adjective");
            divAdjective.classList.add(argonaut.Adjective.toLowerCase());
            divMember.appendChild(divAdjective);
    
            const pAdjective = document.createElement("p");
            pAdjective.innerText = argonaut.Adjective;
            divAdjective.appendChild(pAdjective);
    
            const buttonDelete = document.createElement("button");
            buttonDelete.innerText = "X";
            buttonDelete.classList.add("delete-btn");
            buttonDelete.addEventListener("click", (event) => deleteMember(event));
            divMember.appendChild(buttonDelete);
    
            ul.appendChild(li);
        })
    } else {
        const p = document.createElement("p");
        p.innerText = "La liste est vide !";
        ul.appendChild(p);
    }
}

const getArgonauts = async () => {
    return fetch('index.php/getargonauts')
    .then(response => response.json())
    .catch(error => console.error(error));
}

const clearList = () => {
    const ul = document.querySelector(".list");
    ul.innerHTML = "";
}

const deleteMember = (e) => {
    const parent = e.target.parentNode;
    const id = parent.id;
    removeFromDb(id);
}

const removeFromDb = (id) => {
    const formData = new FormData();
    formData.append("ID", id);

    fetch('index.php/deleteargonaut', {
        method: "post",
        body: formData
    })
    .then(response => refreshArgonautList())
    .catch(error => console.error(error))
}

addEventListener("load", main);