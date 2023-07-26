<?php
defined('APP') or exit('Klasöre Erişim Yetkiniz yok');

class Image{

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

   public function resizeImage($sourcePath, $targetPath, $width, $height) {
        list($sourceWidth, $sourceHeight, $sourceType) = getimagesize($sourcePath);
    
        $sourceImage = null;
        switch ($sourceType) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($sourcePath);
                break;
            default:
                return false; // Desteklenmeyen resim formatı
        }
    
        $sourceAspect = $sourceWidth / $sourceHeight;
        $targetAspect = $width / $height;
    
        // Hedef boyutlarda yeni boyutlar hesaplanırken, oran korunur
        if ($sourceAspect > $targetAspect) {
            $targetHeight = $height;
            $targetWidth = (int) ($height * $sourceAspect);
        } else {
            $targetWidth = $width;
            $targetHeight = (int) ($width / $sourceAspect);
        }
    
        $targetImage = imagecreatetruecolor($width, $height);
    
        // Resmi boyutlandırma işlemi gerçekleştirilir
        imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $sourceWidth, $sourceHeight);
    
        // Hedef formata göre resmi kaydetme
        switch ($sourceType) {
            case IMAGETYPE_JPEG:
                imagejpeg($targetImage, $targetPath, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($targetImage, $targetPath, 9);
                break;
            case IMAGETYPE_GIF:
                imagegif($targetImage, $targetPath);
                break;
        }
    
        // Bellekteki resim nesnelerini serbest bırakma
        imagedestroy($sourceImage);
        imagedestroy($targetImage);
    
        return true;
    }
}


?>