function list(title) {
    document.write("<h2>" + title +"</h2>")
    document.write("<ul>")
    for (var i = 1; i < list.arguments.length; i++) {
        document.write("<li>" + list.arguments[i] + "</li>");
    }
    document.write("</ul>")
}

function listing(toSection, tile, ...items) {

    const sectionBlock = document.createElement("section");
    //sectionBlock.id = id;

    const header2 = document.createElement("h2");
    header2.textContent = tile;
    sectionBlock.appendChild(header2);

    const ul = document.createElement("ul");
    items.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        ul.appendChild(li);
    });

    sectionBlock.appendChild(ul);

    const tSection = document.getElementById(toSection);
    tSection.appendChild(sectionBlock);
}

