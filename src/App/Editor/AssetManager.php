<?php

namespace HansDeBoeck\Grapesjs\App\Editor;

use HansDeBoeck\Grapesjs\App\Repositories\AssetRepository;

class AssetManager
{
    public array $assets = [];
    public ?string $upload = null;
    public ?string $uploadName = null;
    public array $headers = [];
    public int $autoAdd = 1;
    public string $uploadText = 'Plaats bestanden hier of klik om te uploaden';
    public string $addBtnText = 'Afbeelding toevoegen';
    public int $dropzone = 1;
    public int $openAssetsOnDrop = 0;
    public string $modalTitle = 'Afbeeldingen uploaden';
    public bool $showUrlInput = false;

    function __construct(AssetRepository $assetRepository)
    {
        $this->headers['X-CSRF-TOKEN'] = csrf_token();
        $this->upload = $assetRepository->getUploadUrl();    
        $this->uploadName = 'file';

        $this->assets = $assetRepository->getAllMediaLinks();
    }
}
