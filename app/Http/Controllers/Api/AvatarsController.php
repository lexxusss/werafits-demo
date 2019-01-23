<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\AvatarRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AvatarsController extends Controller
{
    /**
     * @var Client
     */
    private $httpClient;

    private $refreshAvatarsUrl;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->refreshAvatarsUrl = config('api.wearfits.domain_url') . config('api.wearfits.api.prefix') . config('api.wearfits.api.refresh_avatars_query');
    }

    /**
     * Trigger refresh avatars queue
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshAvatars(Request $request)
    {
        $result = $this->httpClient->post($this->refreshAvatarsUrl)->getBody()->getContents();

        return response()->json(['result' => $result]);
    }

    /**
     * Get and Refresh created Avatar
     *
     * POST
        body: {
            "hash": STRING,
            "prop": JSON,
            "s3_url_abc": blob,
            "s3_url_glb": blob,
            "s3_url_obj": blob
        }
     *
     * @param AvatarRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCreatedAvatar(AvatarRepository $repository)
    {
        $validation = $repository->validateRequest();
        if ($validation->fails()) {
            return response()->json(['success' => false, 'result' => $validation->errors()])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        $avatar = $repository->createUpdateAvatar();

        return response()->json(['success' => true, 'result' => $avatar]);
    }
}
