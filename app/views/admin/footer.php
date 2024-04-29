    </div>
        </main>
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL ?>/assets/admin-assets/js/script.js"></script>
<script src="https://cdn.tiny.cloud/1/comip58lhd0os8orcneq0smt4o5hf7k77024kcp65j2tqon3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    const image_upload_handler_callback = (blobInfo, progress) => {
        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        return fetch('<?php echo BASE_URL ?>/upload.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP Error: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (!data || typeof data.location !== 'string') {
                throw new Error('Invalid JSON: ' + JSON.stringify(data));
            }
            return data.location;
        })
        .catch(error => {
            throw new Error('Image upload failed: ' + error.message);
        });
    };

    tinymce.init({
        selector: '.edit_post',
        plugins: 'image',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
        images_upload_url: '<?php echo BASE_URL ?>/upload.php',
        images_upload_handler: image_upload_handler_callback
    });



    </script>
</body>

</html>