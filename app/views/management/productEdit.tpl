{extends file="templates/edit.tpl"}

{block name=content}
    <form method="post" action="{$conf->action_url}updateProduct" enctype="multipart/form-data">
        <div class="d-flex align-items-center justify-content-between">
            <input type="hidden" name="idProduct" value="{$product.id_product}"> <!-- Dodajemy ID produktu -->
            <a href="{$conf->app_url}/main" class="d-flex align-items-center">
                <img src="{$conf->app_url}/assets/img/logo.png" alt="Logo" width="50" height="50">
            </a>

            <a class="nav-link d-flex align-items-center" href="{$conf->action_url}/managementMain">
                <i class="bi bi-info-circle" style="font-size: 50px; color: #6c757d;" title="Wróć do zarządzania"></i>
            </a>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-3 fw-normal">Edytuj produkt</h1>
            <button id="theme-toggle-btn" class="btn nav-link me-2" type="button" aria-label="Zmień motyw"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Zmień motyw">
                <i id="theme-icon" class="bi bi-moon"></i>
            </button>
        </div>

        <div class="row g-0 mb-0">
            <!-- G-3 to odstęp między kolumnami -->
            <div class="col-md-8">
                <!-- Trzy kolumny o szerokości 4 (z 12 dostępnych) -->
                <div class="form-floating">
                    <input type="text" class="form-control top-left-field" name="name" id="name" value="{$product.name}">
                    <label for="name">Nazwa</label>
                </div>
            </div>

            <div class="col-md-2">
                <!-- Trzy kolumny o szerokości 4 -->
                <div class="form-floating">
                    <input type="text" class="form-control top-mid-field" name="price" id="price" value="{$product.price}">
                    <label for="price">Cena (zł.gr)</label>
                </div>
            </div>

            <div class="col-md-2">
                <!-- Trzy kolumny o szerokości 4 -->
                <div class="form-floating">
                    <input type="text" class="form-control top-right-field" name="amount" id="amount"
                        value="{$product.amount}"> <label for="amount">Ilość</label>
                </div>
            </div>
        </div>

        <div class="form-floating form-control down-field" name="Opis">
            Opis
            <div class="toolbar">
                <div class="head">
                    <input type="text" placeholder="Filename" value="Nazwa" id="filename" class="filename-input">

                    <input type="file" id="importFile" class="import-file" accept=".txt, .pdf">
                    <label for="importFile" class="import-label">Otwórz</label>

                    <select onchange="fileHandle(this.value); this.selectedIndex=0" class="file-select">
                        <option value="" selected="" hidden="" disabled="">Zapisz</option>
                        <option value="new">Nowy plik</option>
                        <option value="txt">Zapisz jako txt</option>
                        <option value="pdf">Zapisz jako pdf</option>
                        <option value="html">Zapisz jako html</option>
                    </select>

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
                    <select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
                        <option value="" selected="" hidden="" disabled="">Wielkość czcionki</option>
                        <option value="1">Bardzo mała</option>
                        <option value="2">Mała</option>
                        <option value="3">Podstawowa</option>
                        <option value="4">Średnia</option>
                        <option value="5">Duża</option>
                        <option value="6">Bardzo duża</option>
                        <option value="7">Wielka</option>
                    </select>
                    <div class="color">
                        <span><i class="material-icons" style="font-size: 18px;">format_color_fill</i></span>
                        <input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
                    </div>
                    <div class="color">
                        <span><i class="material-icons" style="font-size: 18px;">border_color</i>
                        </span>
                        <input type="color" oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
                    </div>

                </div>
                <div class="btn-toolbar">
                    <button onclick="formatDoc('undo')" title="Cofnij"><i class='bi bi-arrow-return-left'></i></button>
                    <button onclick="formatDoc('redo')" title="Przywróć"><i class='bi bi-arrow-return-right'></i></button>
                    <button onclick="formatDoc('bold')" title="Pogrub"><i class='bi bi-type-bold'></i></button>
                    <button onclick="formatDoc('underline')" title="Podkreśl"><i class='bi bi-type-underline'></i></button>
                    <button onclick="formatDoc('italic')" title="Pochyl"><i class='bi bi-type-italic'></i></button>
                    <button onclick="formatDoc('strikeThrough')" title="Przekreśl"><i
                            class='bi bi-type-strikethrough'></i></button>
                    <button onclick="formatDoc('justifyLeft')" title="Wyrównaj do Lewej"><i
                            class='bi bi-text-left'></i></button>
                    <button onclick="formatDoc('justifyCenter')" title="Wyrównaj do Środka"><i
                            class='bi bi-text-center'></i></button>
                    <button onclick="formatDoc('justifyRight')" title="Wyrównaj do Prawej"><i
                            class='bi bi-text-right'></i></button>
                    <button onclick="formatDoc('justifyFull')" title="Wyrównaj"><i class='bi bi-justify'></i></button>
                    <button onclick="formatDoc('indent')" title="Zwiększ Wcięcie"><i
                            class='bi bi-text-indent-left'></i></button>
                    <button onclick="formatDoc('outdent')" title="Zmniejsz Wcięcie"><i
                            class='bi bi-text-indent-right'></i></button>
                    <button onclick="formatDoc('insertOrderedList')" title="Dodaj Numerowanie"><i
                            class='bi bi-list-ol'></i></button>
                    <button onclick="formatDoc('insertUnorderedList')" title="Dodaj Punktowanie"><i
                            class='bi bi-list-ul'></i></button>
                    <button onclick="formatDoc('insertHorizontalRule')" title="Dodaj Poziomą Linię"><i
                            class='bi bi-dash'></i></button>
                    <button onclick="" title="Dodaj Obraz"><i class="bi bi-card-image"></i></button>
                    <button onclick="" title="Dodaj Link"><i class="bi bi-link-45deg"></i></button>
                    <button onclick="formatDoc('unlink')" title="Usuń Link"><i
                            class="bi bi-link-45deg crossed"></i></button>
                    <button id="show-code" data-active="false" title="Kod"><i class="bi bi-braces"></i></button>
                    <button onclick="formatDoc('removeFormat')" title="Wyczyść Formatowanie"><i
                            class="bi bi-eraser"></i></button>
                </div>
            </div>
            <div id="description" contenteditable="true" spellcheck="false" style="min-height:100px;">{$product.description}</div>
        </div>


        <div id="additional-images" class="d-flex flex-wrap justify-content-center mt-3"></div>
        <!-- Kontener na zdjęcia -->
        <input type="file" name="images[]" id="hidden-file-input" multiple accept="image/*" style="display: none;">
        <div class="d-flex justify-content-center mt-2">
            <button type="button" id="add-image-button" class="btn btn-secondary" style="width: 20%; height:50px">Dodaj
                zdjęcie</button>
        </div>

        {foreach $categories as $category}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{$category.id_category}"
                    id="category{$category.id_category}"
                    {if in_array($category.id_category, array_column($relatedCategories, 'id_category'))} checked {/if}>
                <label class="form-check-label" for="category{$category.id_category}">
                    {$category.name}
                </label>
            </div>
        {/foreach}



        <div class="d-flex justify-content-center mt-2">
            <button type="submit" class="btn btn-primary py-2" style="width: 20%; height:50px">Edytuj produkt</button>
        </div>
    </form>

    <style>
        #additional-images {
            display: flex;
            /* Użyj Flexbox */
            flex-wrap: wrap;
            /* Pozwól na łamanie wierszy */
            justify-content: center;
            /* Wycentruj w poziomie */
        }

        .image-upload-square {
            width: 300px;
            /* Szerokość na cały kontener */
            height: 300px;
            /* Wysokość kwadratu */
            background-color: #f0f0f02d;
            /* Kolor tła kwadratu */
            border: 3px dashed #000000;
            /* Daszowane krawędzie */
            display: flex;
            /* Flexbox dla wyrównania */
            align-items: center;
            /* Wyrównanie w pionie */
            justify-content: center;
            /* Wyrównanie w poziomie */
            cursor: pointer;
            /* Kursor wskazujący na interaktywność */
            margin: 10px;
            /* Odstęp między kwadratami */
            position: relative;
            /* Umożliwia przesunięcia */
            border-radius: 5px;
        }


        .preview-image {
            max-width: 100%;
            /* Ustal maksymalną szerokość obrazu */
            max-height: 100%;
            /* Ustal maksymalną wysokość obrazu */
            object-fit: cover;
            /* Utrzymaj proporcje */
            border-radius: 5px;

        }

        .move-buttons {
            position: absolute;
            /* Umiejscowienie przycisków w kwadracie */
            top: 10px;
            /* Odstęp od góry */
            right: 10px;
            /* Odstęp od prawej */
            display: flex;
            /* Flexbox dla wyrównania */
            gap: 5px;
            /* Odstęp między przyciskami */
            z-index: 10;
            /* Upewnij się, że przyciski są nad obrazem */
        }


        .move-buttons button {
            background: none;
            /* Bez tła */
            border: none;
            /* Bez ramki */
            cursor: pointer;
            /* Wskaźnik kursor */
        }

        .move-button {
            position: absolute;
            background: none;
            /* Bez tła */
            border: none;
            /* Bez ramki */
            z-index: 5;
            /* Upewnij się, że przyciski są nad obrazem */
        }

        .up-button {
            top: 5px;
            /* Pozycja u góry */
            left: 10px;
            /* Przesunięcie w lewo */
        }

        .down-button {
            top: 5px;
            /* Pozycja na dole */
            left: 10px;
            /* Przesunięcie w lewo */
        }

        .index-number {
            position: absolute;
            min-width: 30px;
            text-align: center;
            top: 10px;
            /* Możesz dostosować tę wartość */
            left: 50%;
            /* Wyśrodkowanie poziome */
            transform: translateX(-50%);
            /* Przesunięcie w lewo o 50% szerokości */
            background: rgba(0, 119, 255, 0.8);
            /* Lekko przezroczyste tło */
            padding: 5px;
            /* Odstęp wewnętrzny */
            border-radius: 5px;
            /* Zaokrąglone rogi */
            font-weight: bold;
            /* Pogrubiony tekst */
        }

        .plus {
            font-size: 50px;
            /* Zwiększ rozmiar znaku „+” */
            line-height: 300px;
            /* Wyśrodkowanie w pionie */
            text-align: center;
            /* Wyśrodkowanie w poziomie */
        }
    </style>

    <script>
        let uploadedFiles = []; // Tablica do przechowywania przesłanych plików
        document.getElementById('add-image-button').addEventListener('click', function() {
            addNewImageContainer(); // Funkcja dodająca nowy kontener
        });


        // Dodawanie zdjęć z folderu produktu
        // Odbierz zdjęcia z PHP jako JSON
        const existingImagesObject = JSON.parse('{$existingImages|escape:"javascript"}');
        const existingImages = Object.values(existingImagesObject); // Uzyskaj tablicę wartości

        console.log(existingImages); // Debugowanie

        // Przetwarzanie istniejących obrazów
        existingImages.forEach(async (imagePath, index) => {
            const imgPath = '../public/assets/img/products/{$product.url}/' + imagePath;

            // Pobierz obraz jako Blob
            try {
                const response = await fetch(imgPath);
                const blob = await response.blob();
                const file = new File([blob], imagePath, { type: blob.type });

                uploadedFiles[index] = file; // Zapisz plik w tablicy `uploadedFiles`

                // Dodaj podgląd zdjęcia na stronie
                const newImageDiv = document.createElement('div');
                newImageDiv.classList.add('image-upload-square');

                const imageElement = document.createElement('img');
                imageElement.src = URL.createObjectURL(file); // Ustaw podgląd na blob
                imageElement.classList.add('preview-image');
                newImageDiv.appendChild(imageElement);

                // Dodaj ikony usuwania i przesuwania, tak jak wcześniej
                const trashIcon = createTrashIcon(newImageDiv, index);
                newImageDiv.appendChild(trashIcon);

                const upIcon = createMoveUpIcon(newImageDiv, index);
                newImageDiv.appendChild(upIcon);

                const downIcon = createMoveDownIcon(newImageDiv, index);
                newImageDiv.appendChild(downIcon);

                document.getElementById('additional-images').appendChild(newImageDiv);
                previewImage();
                updateHiddenInput();
            } catch (error) {
                console.error("Błąd podczas pobierania obrazu:", error);
            }
        });


        function addNewImageContainer() {
            const newImageDiv = document.createElement('div');
            newImageDiv.classList.add('image-upload-square');

            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.name = 'images[]';
            newInput.accept = 'image/*';
            newInput.style.display = 'none';

            newInput.onchange = function() {
                const files = Array.from(this.files);
                if (files.length > 0) {
                    const index = getAvailableIndex(); // Pobierz dostępny indeks
                    uploadedFiles[index] = files[0]; // Ustaw plik na właściwym indeksie
                    previewImage(); // Odśwież podgląd zdjęcia
                    updateHiddenInput();
                }
            };

            newImageDiv.appendChild(newInput);

            newImageDiv.onclick = function() {
                newInput.click();
            };

            const plusSpan = document.createElement('span');
            plusSpan.classList.add('plus');
            plusSpan.textContent = '+';
            newImageDiv.appendChild(plusSpan);

            document.getElementById('additional-images').appendChild(newImageDiv);
            uploadedFiles.push(null); // Dodaj `null` jako symboliczne miejsce dla nowego pliku
        }

        function getAvailableIndex() {
            return uploadedFiles.findIndex(file => file === null);
        }

        function updateHiddenInput() {
            const hiddenInput = document.getElementById('hidden-file-input');
            const dataTransfer = new DataTransfer();

            console.log(uploadedFiles);

            uploadedFiles.forEach(file => {
                // Dodajemy tylko pliki, które są instancjami File
                if (file instanceof File) {
                    dataTransfer.items.add(file);
                }
            });

            hiddenInput.files = dataTransfer.files; // Ustaw pliki w ukrytym polu
        }

        function removeNullFiles() {
            uploadedFiles = uploadedFiles.filter(file => file instanceof File);
        }

        function createTrashIcon(container, index) {
            const trashIcon = document.createElement('button');
            trashIcon.innerHTML = '<i class="bi bi-trash"></i>';
            trashIcon.classList.add('btn', 'btn-danger', 'btn-sm', 'trash-button');
            trashIcon.onclick = function(event) {
                event.stopPropagation(); // Zapobiegaj propagacji kliknięcia

                // Usuń kontener ze zdjęciem
                container.remove();

                // Ustaw miejsce jako null
                uploadedFiles[index] = null;

                // Przesuń elementy w tablicy w lewo
                for (let i = index; i < uploadedFiles.length - 1; i++) {
                    uploadedFiles[i] = uploadedFiles[i + 1];
                }
                uploadedFiles.pop(); // Usuń ostatni element

                // Odśwież podgląd zdjęcia i ukryte pole po usunięciu zdjęcia
                previewImage();
                updateHiddenInput();
            };

            trashIcon.style.position = 'absolute';
            trashIcon.style.bottom = '10px';
            trashIcon.style.right = '10px';

            return trashIcon;
        }

        function createMoveUpIcon(container, index) {
            const moveUpIcon = document.createElement('button');
            moveUpIcon.innerHTML = '<i class="bi bi-chevron-left"></i>';
            moveUpIcon.classList.add('btn', 'btn-secondary', 'btn-sm');

            moveUpIcon.onclick = function(event) {
                event.stopPropagation();
                event.preventDefault();

                if (index > 0) {
                    swapElements(uploadedFiles, index, index - 1); // Zamień elementy
                    previewImage(); // Odśwież podgląd zdjęcia
                }
                updateHiddenInput(); // Aktualizuj ukryte pole po usunięciu zdjęcia
            };

            moveUpIcon.style.position = 'absolute';
            moveUpIcon.style.top = '10px';
            moveUpIcon.style.left = '10px';

            return moveUpIcon;
        }

        function createMoveDownIcon(container, index) {
            const moveDownIcon = document.createElement('button');
            moveDownIcon.innerHTML = '<i class="bi bi-chevron-right"></i>';
            moveDownIcon.classList.add('btn', 'btn-secondary', 'btn-sm');

            moveDownIcon.onclick = function(event) {
                event.stopPropagation();
                event.preventDefault();

                if (index < uploadedFiles.length - 1) {
                    swapElements(uploadedFiles, index, index + 1); // Zamień elementy
                    previewImage(); // Odśwież podgląd zdjęcia
                }
                updateHiddenInput(); // Aktualizuj ukryte pole po usunięciu zdjęcia
            };

            moveDownIcon.style.position = 'absolute';
            moveDownIcon.style.top = '10px';
            moveDownIcon.style.right = '10px';

            return moveDownIcon;
        }

        function swapElements(array, index1, index2) {
            if (index1 >= 0 && index1 < array.length && index2 >= 0 && index2 < array.length) {
                let temp = array[index1];
                array[index1] = array[index2];
                array[index2] = temp;
            } else {
                console.log("Indeksy są poza zakresem tablicy.");
            }
        }

        function previewImage() {
            const parentContainer = document.getElementById('additional-images');
            parentContainer.innerHTML = ''; // Wyczyść kontener przed dodaniem nowych obrazów

            uploadedFiles.forEach((file, index) => {
                const container = document.createElement('div');
                container.classList.add('image-upload-square');

                const image = document.createElement('img');
                image.classList.add('preview-image');

                if (file instanceof File) {
                    // Przetwarzaj jako plik
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        image.src = e.target.result;
                        container.appendChild(image); // Dodaj obraz do kontenera
                    };
                    reader.readAsDataURL(file); // Wczytaj plik jako URL
                } else {
                    // Przetwarzaj jako URL
                    image.src = file; // Ustaw źródło na URL
                    container.appendChild(image); // Dodaj obraz do kontenera
                }

                // Dodaj obsługę kliknięcia do edycji
                image.onclick = function() {
                    const editInput = document.createElement('input');
                    editInput.type = 'file';
                    editInput.accept = 'image/*';
                    editInput.style.display = 'none';

                    editInput.onchange = function() {
                        const newFile = this.files[0];
                        if (newFile) {
                            uploadedFiles[index] = newFile; // Aktualizuj plik w tablicy

                            const newReader = new FileReader();
                            newReader.onload = function(e) {
                                image.src = e.target.result; // Zaktualizuj obraz na nowy plik
                            };
                            newReader.readAsDataURL(newFile);
                            updateHiddenInput(); // Aktualizuj ukryte pole
                        }
                    };

                    editInput.click();
                };

                // Tworzenie numeru indeksu
                const indexDiv = document.createElement('div');
                indexDiv.classList.add('index-number');
                indexDiv.textContent = index + 1; // Ustaw tekst na numer indeksu
                container.appendChild(indexDiv); // Dodaj div do kontenera

                // Dodanie ikon
                const trashIcon = createTrashIcon(container, index);
                container.appendChild(trashIcon);

                const upIcon = createMoveUpIcon(container, index);
                container.appendChild(upIcon);

                const downIcon = createMoveDownIcon(container, index);
                container.appendChild(downIcon);

                parentContainer.appendChild(container);
            });
        }
    </script>

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
{/block}