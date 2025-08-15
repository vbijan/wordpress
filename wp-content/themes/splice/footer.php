     <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4 mb-3">
                    <h5>About Us</h5>
                    <p class="small">
                        We build awesome projects with passion and creativity.
                    </p>
                </div>

                <!-- Column 2 -->
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <!-- <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Projects</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    </ul> -->
                    <?php wp_nav_menu([
                        'menu' => "footer",
                        'menu_class'     => 'list-unstyled',
                        'container' => false,
                      ]); ?>
                </div>

                <!-- Column 3 -->
                <div class="col-md-4 mb-3">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <hr class="border-light">
            <div class="text-center small">
                &copy; <?php echo date('Y'); ?> Splice Project. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>