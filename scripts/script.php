<button type="button" class="btn btn-primary rounded-circle p-2" id="back-to-top" style="position: fixed; bottom: 20px; right: 20px; display: none; width: 50px; height: 50px; border-color: black; border-width: 2px; border-top-width: 5px; border-left-width: 3px; border-right-width: 3px;">
    <i class="fas fa-arrow-up"></i>
    </button>
<!--Usiamo Javacript con HTML -->
<script>
    //Prendiamo il bottone
    var backToTopButton = document.getElementById("back-to-top");

    // Quando scrolla più di 20px dal top del documento, mostra il bottone
    window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    };

    // Al click torna in cima al documento
    backToTopButton.onclick = function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    };
</script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
