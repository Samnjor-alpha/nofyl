window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const documentation = this.document.getElementById("print");
            console.log(documentation);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'nofyl.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(documentation).set(opt).save();
        })
}