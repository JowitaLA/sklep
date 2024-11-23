<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{$subpage.title}</h1>
</div>

        <form method="post" action="{$conf->action_url}updateSubpage" enctype="multipart/form-data" style="min-height: 50vh;">
            <div class="form-floating form-control solo-field" name="Opis">
                <div class="row g-5 d-flex">
                    <div class="col-md-9">
                        <div id="description" contenteditable="true" spellcheck="false" style="height: 100%;">
                            {$subpage.description}</div>
                    </div>

                    <div class="col-md-3">
                        <div class="position-sticky" style="top: 2rem;">
                            <div class="toolbar">
                                <div class="head">
                                    <div class="container">
                                    <div class = "edit">
                                        <input type="text" placeholder="Filename" value="Nazwa" id="filename"
                                            class="filename-input">

                                        <input type="file" id="importFile" class="import-file" accept=".txt, .pdf">
                                        <label for="importFile" class="import-label">Otwórz</label>
                                    </div>
                                    </div>
                                    <div class="container edit">
                                    <div class = "edit">
                                        <select onchange="fileHandle(this.value); this.selectedIndex=0"
                                            class="file-select">
                                            <option value="" selected="" hidden="" disabled="">Zapisz</option>
                                            <option value="new">Nowy plik</option>
                                            <option value="txt">Zapisz jako txt</option>
                                            <option value="pdf">Zapisz jako pdf</option>
                                            <option value="html">Zapisz jako html</option>
                                        </select>
                                        </div>

                                    </div>
                                    <div class="container edit">
                                    <div class = "edit">

                                        <select onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
                                            <option value="" selected="" hidden="" disabled="">Format</option>
                                            <option value="h1">Nagłówek 1</option>
                                            <option value="h2">Nagłówek 2</option>
                                            <option value="h3">Nagłówek 3</option>
                                            <option value="h4">Nagłówek 4</option>
                                            <option value="h5">Nagłówek 5</option>
                                            <option value="h6">Nagłówek 6</option>
                                            <option value="p">Paragraf</option>
                                        </select>
                                        </div>

                                    </div>
                                    <div class="container edit">
                                        <select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
                                            <option value="" selected="" hidden="" disabled="">Wielkość czcionki
                                            </option>
                                            <option value="1">Bardzo mała</option>
                                            <option value="2">Mała</option>
                                            <option value="3">Podstawowa</option>
                                            <option value="4">Średnia</option>
                                            <option value="5">Duża</option>
                                            <option value="6">Bardzo duża</option>
                                            <option value="7">Wielka</option>
                                        </select>
                                    </div>
                                    <div class="container edit">
                                    <div class = "edit">

                                        <div class="color">
                                            <span><i class="material-icons"
                                                    style="font-size: 18px;">format_color_fill</i></span>
                                            <input type="color"
                                                oninput="formatDoc('foreColor', this.value); this.value='#000000';">
                                        </div>
                                        <div class="color">
                                            <span><i class="material-icons"
                                                    style="font-size: 18px;">border_color</i></span>
                                            <input type="color"
                                                oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="btn-toolbar">
                                    <div class="container edit">
                                    <div class = "edit">

                                        <button onclick="formatDoc('undo')" title="Cofnij"
                                            style="width: 30px; height: 30px;"><i class='bi bi-arrow-return-left'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('redo')" title="Przywróć"
                                            style="width: 30px; height: 30px;"><i class='bi bi-arrow-return-right'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('bold')" title="Pogrub"
                                            style="width: 30px; height: 30px;"><i class='bi bi-type-bold'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('underline')" title="Podkreśl"
                                            style="width: 30px; height: 30px;"><i class='bi bi-type-underline'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('italic')" title="Pochyl"
                                            style="width: 30px; height: 30px;"><i class='bi bi-type-italic'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('strikeThrough')" title="Przekreśl"
                                            style="width: 30px; height: 30px;"><i class='bi bi-type-strikethrough'
                                                style="width: 25px; height: 25px;"></i></button>
                                    </div>
                                                </div>
                                    <div class="container edit">
                                    <div class = "edit">

                                        <button onclick="formatDoc('justifyLeft')" title="Wyrównaj do Lewej"
                                            style="width: 30px; height: 30px;"><i class='bi bi-text-left'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('justifyCenter')" title="Wyrównaj do Środka"
                                            style="width: 30px; height: 30px;"><i class='bi bi-text-center'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('justifyRight')" title="Wyrównaj do Prawej"
                                            style="width: 30px; height: 30px;"><i class='bi bi-text-right'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('justifyFull')" title="Wyrównaj"
                                            style="width: 30px; height: 30px;"><i class='bi bi-justify'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('indent')" title="Zwiększ Wcięcie"
                                            style="width: 30px; height: 30px;"><i class='bi bi-text-indent-left'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('outdent')" title="Zmniejsz Wcięcie"
                                            style="width: 30px; height: 30px;"><i class='bi bi-text-indent-right'
                                                style="width: 25px; height: 25px;"></i></button>
                                    </div>
                                    </div>
                                    <div class="container edit">
                                    <div class = "edit">

                                        <button onclick="formatDoc('insertOrderedList')" title="Dodaj Numerowanie"
                                            style="width: 30px; height: 30px;"><i class='bi bi-list-ol'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('insertUnorderedList')" title="Dodaj Punktowanie"
                                            style="width: 30px; height: 30px;"><i class='bi bi-list-ul'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('insertHorizontalRule')" title="Dodaj Poziomą Linię"
                                            style="width: 30px; height: 30px;"><i class='bi bi-dash'
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="" title="Dodaj Obraz" style="width: 30px; height: 30px;"><i
                                                class="bi bi-card-image"
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="" title="Dodaj Link" style="width: 30px; height: 30px;"><i
                                                class="bi bi-link-45deg"
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('unlink')" title="Usuń Link"
                                            style="width: 30px; height: 30px;"><i class="bi bi-link-45deg crossed"
                                                style="width: 25px; height: 25px;"></i></button>
                                    </div>
                                    </div>
                                    <div class="container edit">
                                    <div class = "edit">

                                        <button id="show-code" data-active="false" title="Kod"
                                            style="width: 30px; height: 30px;"><i class="bi bi-braces"
                                                style="width: 25px; height: 25px;"></i></button>
                                        <button onclick="formatDoc('removeFormat')" title="Wyczyść Formatowanie"
                                            style="width: 30px; height: 30px;"><i class="bi bi-eraser"
                                                style="width: 25px; height: 25px;"></i></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <input type="hidden" name="subpage" value="{$subpage.file}">
                                    <button type="submit" class="btn btn-primary py-2 mt-2" style="">Zapisz
                                        zmiany</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    function formatDoc(cmd, value = null) {
        event.preventDefault();
        event.stopPropagation(); // zatrzymuje propagację zdarzenia
        if (value) {
            document.execCommand(cmd, false, value);
        } else {
            document.execCommand(cmd);
        }
    }

    const imageButton = document.querySelector('.bi-card-image').parentElement;

    imageButton.addEventListener('click', function(event) {
        event.preventDefault(); // Zapobiega akcji przycisku
        addImage(event); // Przekazuje event do addImage
    });


    function addImage(event) {
        event.preventDefault();
        const url = prompt('Wprowadź link do obrazu');
        if (url) {
            formatDoc('insertImage', url);
        }
    }

    const linkButton = document.querySelector('.bi-link-45deg').parentElement;

    linkButton.addEventListener('click', function(event) {
        event.preventDefault(); // Zapobiega akcji przycisku
        addLink(event); // Przekazuje event do addLink
    });


    function addLink(event) {
        event.preventDefault();
        const url = prompt('Prowadź link');
        if (url) {
            formatDoc('createLink', url);
        }
    }

    const content = document.getElementById('description');

    content.addEventListener('mouseenter', function() {
        event.preventDefault();
        event.stopPropagation();
        const a = content.querySelectorAll('a');
        a.forEach(item => {
            event.preventDefault(); // zapobiega domyślnej akcji linka
            item.addEventListener('click', function(event) {});
            item.addEventListener('mouseenter', function() {
                content.setAttribute('contenteditable', false);
                item.target = '_blank';
            });
            item.addEventListener('mouseleave', function() {
                content.setAttribute('contenteditable', true);
            });
        });
    });

    const showCode = document.getElementById('show-code');
    let active = false;

    showCode.addEventListener('click', function(event) {
        event.preventDefault(); // zapobiega domyślnej akcji kliknięcia
        showCode.dataset.active = !active;
        active = !active;
        if (active) {
            content.textContent = content.innerHTML;
            content.setAttribute('contenteditable', false);
        } else {
            content.innerHTML = content.textContent;
            content.setAttribute('contenteditable', true);
        }
    });

    const filename = document.getElementById('filename');

    function fileHandle(value) {
        if (value === 'new') {
            content.innerHTML = '';
            filename.value = 'Nazwa';
        } else if (value === 'html') {
            const blob = new Blob([content.innerHTML], { type: 'text/plain' }); // Użyj innerHTML
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = filename.value + ".txt";
            link.click();
        } else if (value === 'pdf') {
            html2pdf(content).save(filename.value);
        } else if (value === 'txt') {
            const blob = new Blob([content.innerText]);
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = filename.value + ".txt";
            link.click();
        }
    }

    document.getElementById('importFile').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Wybiera pierwszy plik

        if (file) {
            const fileType = file.type; // Odczytuje typ pliku

            if (fileType === "text/plain") {
                const reader = new FileReader(); // Tworzy obiekt FileReader
                reader.onload = function(e) {
                    const content = e.target.result; // Odczytuje zawartość pliku
                    // Zastąp wszystkie wystąpienia nowych linii w pliku HTML
                    document.getElementById('description').innerHTML = content.replace(/\n/g, '<br>');
                };
                reader.readAsText(file); // Odczytuje plik jako tekst
            } else if (fileType === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function(e) {
                    const typedarray = new Uint8Array(e.target.result);

                    pdfjsLib.getDocument(typedarray).promise.then(pdf => {
                        let pdfContent = '';

                        // Odczytaj każdą stronę PDF
                        const promises = [];
                        for (let i = 1; i <= pdf.numPages; i++) {
                            promises.push(pdf.getPage(i).then(page => {
                                return page.getTextContent().then(textContent => {
                                    const textItems = textContent.items;
                                    let pageContent = '';

                                    for (let j = 0; j < textItems.length; j++) {
                                        const item = textItems[j];
                                        const text = item.str;

                                        // Sprawdzenie stylów
                                        if (item.transform) {
                                            const fontSize = item.transform[0];
                                            const isBold = item.fontName
                                                .includes('Bold');
                                            const isItalic = item.fontName
                                                .includes('Italic');

                                            // Ustalanie stylów CSS
                                            let style = '';
                                            if (isBold) style +=
                                                'font-weight: bold; ';
                                            if (isItalic) style +=
                                                'font-style: italic; ';

                                            // Dodaj tekst z odpowiednim stylem
                                            pageContent += `<span style="` +
                                                style + `">` + text + `</span>`;
                                        }
                                    }
                                    // Dodaj przerwę między stronami
                                    pageContent += '<br>';
                                    pdfContent += pageContent;
                                });
                            }));
                        }

                        Promise.all(promises).then(() => {
                            document.getElementById('description').innerHTML =
                                pdfContent; // Wstawia zawartość do edytowalnego elementu
                        });
                    });
                };

                fileReader.readAsArrayBuffer(file); // Odczytuje plik jako bufor
            }
        }
    });
</script>
<link href="{$conf->app_url}/assets/dist/css/editor.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<!-- Custom styles for this template -->

<link href="editor.css" rel="stylesheet">

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Zatrzymaj wysyłanie formularza

        const content = document.getElementById('description');
        const hiddenDescriptionField = document.createElement('input');
        hiddenDescriptionField.type = 'hidden';
        hiddenDescriptionField.name = 'description';

        // Używamy trim() do usunięcia nadmiarowych spacji
        hiddenDescriptionField.value = content.innerHTML.trim() ? content.innerHTML.trim() : "";

        this.appendChild(hiddenDescriptionField); // Dodaj ukryte pole do formularza
        this.submit(); // Wyślij formularz
    });
</script>