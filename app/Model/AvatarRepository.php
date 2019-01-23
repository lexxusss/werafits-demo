<?php

namespace App\Model;

use App\Http\Requests\AvatarRequest;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\Request;

class AvatarRepository
{
    /**
     * @var Filesystem | FilesystemAdapter
     */
    private $storage;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $validationRules;

    /**
     * SPhotoRepository constructor.
     * @param Request $request
     * @param Filesystem | FilesystemAdapter $storage
     */
    public function __construct(Request $request, FilesystemAdapter $storage)
    {
        $this->storage = $storage;
        $this->request = $request;
        $this->data = $request->all();
        $this->validationRules = [
            'hash' => 'required|custom.is_md5',
            'prop' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        return $this->validationRules;
    }

    /**
     * Validate request according to $this->validationRules
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validateRequest()
    {
        return \Validator::make($this->request->all(), $this->validationRules);
    }

    /**
     * @param AvatarRequest $request
     * @return $this
     */
    public function setAvatarRequest(AvatarRequest $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function createUpdateAvatar()
    {
        $hash = $this->data['hash'];
        $prop = $this->data['prop'];

        $avatar = Avatar::query()->firstOrNew(['hash' => $hash]);
        $avatar->fill([
                'prop' => is_array($prop) ? collect($prop) : collect(json_decode($prop, 1)),
                's3_url_abc' => $this->downloadPhotoAndGetUrl('s3_url_abc', "$hash.abc", $avatar->s3_url_abc),
                's3_url_glb' => $this->downloadPhotoAndGetUrl('s3_url_glb', "$hash.glb", $avatar->s3_url_glb),
                's3_url_obj' => $this->downloadPhotoAndGetUrl('s3_url_obj', "$hash.obj", $avatar->s3_url_obj),
            ]);
        $avatar->save();

        return $avatar;
    }

    /**
     * Download file to cloud and get url
     *
     * @param $attr
     * @param $filename
     * @param null $default
     * @return null|string
     */
    public function downloadPhotoAndGetUrl($attr, $filename, $default = null)
    {
        $file = $this->getFileFromRequest($attr);
        if ($file) {
            $this->storage->put($filename, fopen($file->path(), 'r'));

            return $this->storage->url($filename);
        }

        return $default;
    }

    /**
     * @param $attr
     * @return \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null
     */
    private function getFileFromRequest($attr)
    {
        return $this->data[$attr] ?? null;
    }

}
