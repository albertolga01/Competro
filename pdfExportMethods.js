// START: DocRaptor
function downloadPDFWithDocRaptor() {
  DocRaptor.createAndDownloadDoc('YOUR_API_KEY_HERE', {
    test: true, // test documents are free, but watermarked
    type: 'pdf',
    name: 'MLB World Series Winnersxc',
    document_content: document.querySelector('html').innerHTML,
  })
}

document.querySelector('#docRaptor').addEventListener('click', downloadPDFWithDocRaptor);
// END: DocRaptor


// START: pdfmake
function downloadPDFWithPDFMake() {
  var tableHeaderText = [...document.querySelectorAll('#styledTable thead tr th')].map(thElement => ({ text: thElement.textContent, style: 'tableHeader' }));

  var tableRowCells = [...document.querySelectorAll('#styledTable tbody tr td')].map(tdElement => ({ text: tdElement.textContent, style: 'tableData' }));
  var tableDataAsRows = tableRowCells.reduce((rows, cellData, index) => {
    if (index % 4 === 0) {
      rows.push([]);
    }

    rows[rows.length - 1].push(cellData);
    return rows;
  }, []);

  var docDefinition = {
    header: { text: 'MLB World Series Winnersxs', alignment: 'center' },
    footer: function(currentPage, pageCount) { return ({ text: `Page ${currentPage} of ${pageCount}`, alignment: 'center' }); },
    content: [
      {
        style: 'tableExample',
        table: {
          headerRows: 1,
          body: [
            tableHeaderText,
            ...tableDataAsRows,
          ]
        },
        layout: {
          fillColor: function(rowIndex) {
            if (rowIndex === 0) {
              return '#0f4871';
            }
            return (rowIndex % 2 === 0) ? '#f2f2f2' : null;
          }
        },
      },
    ],
    styles: {
      tableExample: {
        margin: [0, 20, 0, 80],
      },
      tableHeader: {
        margin: 12,
        color: 'white',
      },
      tableData: {
        margin: 12,
      },
    },
  };
  pdfMake.createPdf(docDefinition).download('MLB World Series Winnersxs');
}

document.querySelector('#pdfmake').addEventListener('click', downloadPDFWithPDFMake);
// END: pdfmake


// START: jsPDF
function downloadPDFWithjsPDF() {
    var doc = new jspdf.jsPDF({
        orientation: 'p',
        unit: 'pt',
        format: 'a4'
    });
 
    doc.html(document.querySelector('#styledTable'), {
        callback: function (doc) {
		        doc.save(document.querySelector('#jsPDF').innerHTML);
			          //edit para guardar en el servidor
            var blob = doc.output('blob');
            var formData = new FormData();
            formData.append('pdf', blob);
            formData.append('archivoconruta', document.getElementById("jsPDF").innerText);
            
            $.ajax('scripts/upload.php',
            { 
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                sucess: function(data){console.log(data)},
                error: function(data){console.log(data)}
            });  
        },

        margin: [60, 60, 60, 60],
        x: 32,
        y: 32,
        html2canvas: {
            scale: 0.7, //this was my solution, you have to adjust to your size
            width: 1000 //for some reason width does nothing
        },
    });
}

document.querySelector('#jsPDF').addEventListener('click', downloadPDFWithjsPDF);
// END: jsPDF


// START: browser print (native functionality, right-click >> Print (or Command + P))
function downloadPDFWithBrowserPrint() {
  window.print();
}
document.querySelector('#browserPrint').addEventListener('click', downloadPDFWithBrowserPrint);
// END: browser print
