import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";
var tabelaAlunos;
var url = "http://localhost/unipublica-site/public/";
(function(cash) {
    "use strict";

    if (cash("#tabelaAlunos").length) {

        //define table
        var table = new Tabulator("#tabelaAlunos", {
            ajaxURL: url + "aluno", //ajax URL
            ajaxConfig: "GET", //ajax HTTP request type
            ajaxContentType: "json",
            tooltips: true, //example option (enable tooltips on all cells)
            printAsHtml: true,
            printStyled: true,
            pagination: "local",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "Nenhum registro encontrado",
            columns: [
                { title: "Aluno", field: "name", sorter: "string", minWidth: 200 },
                { title: "CPF", field: "cpf", minWidth: 200 },
                { title: "E-mail", hozAlign: "center", field: "email", sorter: "string", minWidth: 200 },
                { title: "Telefone", hozAlign: "center", field: "phone", sorter: "string", minWidth: 200 },
                { title: "Cidade", hozAlign: "center", field: "city", sorter: "string", minWidth: 200 },
                { title: "UF", hozAlign: "center", field: "state", sorter: "string", minWidth: 200 },
                {
                    title: "Status",
                    minWidth: 200,
                    field: "status",
                    vertAlign: "middle",
                    formatter(cell, formatterParams) {
                        return `<div class="flex items-center lg:justify-center ${  cell.getData().status == "able" ? "text-theme-9" : "text-theme-6" }">
                                    ${ cell.getData().status == "able" ? "Habilitado" : "Desabilitado"}
                                </div>`;
                    },
                },
                {
                    title: "Ações",
                    minWidth: 200,
                    field: "actions",
                    responsive: 1,
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell, formatterParams) {
                        let id = cell.getData().id;
                        let a = cash(`<div class="flex lg:justify-center items-center">
                            <a class="edit flex items-center mr-3" href="` + url + `painel/alunos/` + id + `">
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                            </a>
                            <a class="delete flex items-center text-theme-6">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Deletar
                            </a>
                            <div id="modalDelete` + id + `" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Você tem certeza?</div>
                                                <div class="text-gray-600 mt-2">Você realmente quer excluir o usuário <strong> ${ cell.getData().name } </strong> ? <br>Esse processo não pode ser desfeito.</div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">
                                                    Cancelar
                                                </button>
                                                <button type="button" onclick="excluirAluno(` + id + `);" class="btn btn-danger w-24">
                                                    Excluir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                        cash(a)
                            .find(".delete")
                            .on("click", function() {
                                cash("#modalDelete" + id).modal("show");
                            });

                        return a[0];
                    },
                }
            ],
            locale: true,
            langs: {
                "pt-br": {
                    "ajax": {
                        "loading": "Carregando...", //ajax loader text
                        "error": "Erro!", //ajax error text
                    },
                    "groups": { //copy for the auto generated item count in group header
                        "item": "item", //the singular  for item
                        "items": "items", //the plural for items
                    },
                    "pagination": {
                        "page_size": "Número de Registros", //label for the page size select element
                        "page_title": "Mostrar Página", //tooltip text for the numeric page button, appears in front of the page number (eg. "Show Page" will result in a tool tip of "Show Page 1" on the page 1 button)
                        "first": "Primeiro", //text for the first page button
                        "first_title": "Primeira Página", //tooltip text for the first page button
                        "last": "Último",
                        "last_title": "Última Página",
                        "prev": "Anterior",
                        "prev_title": "Página Anterior",
                        "next": "Próximo",
                        "next_title": "Próxima Página",
                        "all": "Todos",
                    }
                }
            },
            renderComplete() {
                feather.replace({
                    "stroke-width": 1.5,
                });
            },
        });

        // Redraw table onresize
        window.addEventListener("resize", () => {
            table.redraw();
            feather.replace({
                "stroke-width": 1.5,
            });
        });

        // Filter function
        function filterHTMLForm() {
            let field = cash("#tabulator-html-filter-field").val();
            let type = cash("#tabulator-html-filter-type").val();
            let value = cash("#tabulator-html-filter-value").val();
            table.setFilter(field, type, value);
        }

        // On submit filter form
        cash("#tabulator-html-filter-form")[0].addEventListener(
            "keypress",
            function(event) {
                let keycode = event.keyCode ? event.keyCode : event.which;
                if (keycode == "13") {
                    event.preventDefault();
                    filterHTMLForm();
                }
            }
        );

        // On click go button
        cash("#tabulator-html-filter-go").on("click", function(event) {
            filterHTMLForm();
        });

        // On reset filter form
        cash("#tabulator-html-filter-reset").on("click", function(event) {
            cash("#tabulator-html-filter-field").val("name");
            cash("#tabulator-html-filter-type").val("like");
            cash("#tabulator-html-filter-value").val("");
            filterHTMLForm();
        });

        // Export
        cash("#tabulator-export-csv").on("click", function(event) {
            table.download("csv", "data.csv");
        });

        cash("#tabulator-export-json").on("click", function(event) {
            table.download("json", "data.json");
        });

        cash("#tabulator-export-xlsx").on("click", function(event) {
            window.XLSX = xlsx;
            table.download("xlsx", "data.xlsx", {
                sheetName: "Products",
            });
        });

        cash("#tabulator-export-html").on("click", function(event) {
            table.download("html", "data.html", {
                style: true,
            });
        });

        // Print
        cash("#tabulator-print").on("click", function(event) {
            table.print();
        });

        tabelaAlunos = table.getData();
    }
})(cash);