<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\File;
use App\User;

class UserProfileImageController extends Controller
{
    // edit image modal
    public function edit_user_profile_image(Request $request, int $id)
    {
        $user = User::find($id);
        return view(default_template() . '.pages.modal.editModal.edit_user_profile_image', compact('user'));
    }
    /**
     * Return  updated image 
     * @param Request $request, String $upateProfileImage, int $id
     * @return profile image
     */
    public function update_profile_image(Request $request, String $upateProfileImage, int $id)
    {
        switch ($upateProfileImage) {
            case 'userImage':
                $user = User::find($id);
                request()->validate([

                    'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]);
                if (request()->has('profile_pic')) {
                    $f = $request->file('profile_pic');
                    $fileExtension = $f->getClientOriginalExtension(); //.jpeg 
                    $fileName = md5(time() . rand()); //234234ASDF234asdf2
                    $fileName .= "." . $fileExtension;
                    //Directory = storage/user/profile
                    if (!file_exists(storage_path('/user/profile'))) {
                        mkdir(storage_path('/user/profile'), 0777, true);
                    }
                    $f->move(storage_path('/user/profile') . DIRECTORY_SEPARATOR, $fileName);

                    $dbData = [
                        "type" => "profile",
                        "file_name" => $fileName,
                        "userc_id" => auth()->id(),
                        "table_name" => "users",
                        "table_id" => $user->id
                    ];

                    if ($hasFile = $this->userProfileImage($user)) {
                        /** UPDATE */
                        $this->updateProfileImage($hasFile, $dbData);
                    } else {
                        $this->saveProfileImage($fileName, $user, $dbData);
                    }
                }
                return redirect()->route('user.profile', ['id' => $user->id]);
                // return response()->json(["message" => 'Updated successfully.']);
            default:
                return 'Error';
        }
    }
    protected function userPreview()
    {
        return view(default_template() . '.pages.dashboard.inc.userPreview');
    }
    private function userProfileImage(User $user)
    {
        return File::where([
            "table_name" => "users",
            "table_id" => $user->id,
            "type" => "profile",
            "is_deleted" => 0
        ])->first();
    }

    private function saveProfileImage(string $fileName, User $user, array $dbData)
    {
        $file = new File();
        return $file->create($dbData);
    }

    private function updateProfileImage(File $file, array $dbData)
    {
        return $file->update($dbData);
    }

    public function getImage($image)
    {
        dd($image);
        $file = storage_path('user/profile' . $image);
        if (file_exists($file)) {
            return response()->file($file);
        }
        abort(404);
    }
}
