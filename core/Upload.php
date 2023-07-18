<?php
trait imageUpload{

    private $targetDirectory;

    public function uploadImage($file,$targetDirectory="/uploads/")
    {
        $this->targetDirectory=$targetDirectory;
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $maxFileSize = 1 * 1024 * 1024; // 5MB

        // Dosya uzantısını kontrol edin (isteğe bağlı)
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = array('jpg', 'jpeg', 'png');

        
        if (!in_array($fileExtension, $allowedExtensions)) {

                setSession('errorMessage',  "Sadece JPG, JPEG ve PNG dosyaları yükleyebilirsiniz.");
                return false;
        }

        // Dosya boyutunu kontrol edin (isteğe bağlı)
        if ($fileSize > $maxFileSize) {
         setSession('errorMessage',  "Dosya boyutu çok büyük. Maksimum dosya boyutu".$maxFileSize." olmalıdır.");
         return false;
        }

        if ($fileError !== 0) {
            setSession('errorMessage',  "Dosya yüklenirken bir hata oluştu lütfen Tekrar deneyiniz.");
            return false;
        }

        $newFileName = md5(time().$fileName). '.' . $fileExtension;
        $targetPath = $this->targetDirectory . '/' . $newFileName;

        if (move_uploaded_file($fileTmpName, $targetPath)) {
        
                setSession('errorMessage',  "Dosya başarıyla eklendi");
                return $newFileName;

        } else {
            setSession('errorMesage',  "Dosya yüklenirken bir hata oluştu. Lütfen tekrar deneyiniz");
        }
    }
}


?>