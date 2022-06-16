<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/user', 'User\Home::index');
$routes->get('/user/profile', 'User\Profile::index');
$routes->post('/user/updateUser', 'User\UpdateUser::index');
$routes->post('/user/changePassword', 'User\ChangePassword::index');

$routes->match(['get', 'post'], 'login', 'User::login', ["filter" => "noauth"]);
// Author routes
$routes->group("author", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Author\Home::index");
    $routes->get('submit/', 'Author\Submit::index');
    $routes->get('submit/(:num)', 'Author\Submit::index/$1');
    $routes->get('submit/(:num)/(:num)', 'Author\Submit::index/$1/$2');
    $routes->add('saveSubmit/(:num)', 'Author\SaveSubmit::index/$1');
    $routes->add('saveSubmit/(:num)/(:num)', 'Author\SaveSubmit::index/$1/$2');
    $routes->get('deleteSubmission/(:num)', 'Author\DeleteSubmission::index/$1');
    $routes->get('removeAuthor/(:num)', 'Author\RemoveAuthor::index/$1');
    $routes->get('submission/(:num)', 'Author\Submission::index/$1');
    $routes->get('submissionReview/(:num)', 'Author\submissionReview::index/$1');
    $routes->get('submissionEditing/(:num)', 'Author\submissionEditing::index/$1');
    $routes->get('completeAuthorCopyedit/(:num)', 'Author\completeAuthorCopyedit::index/$1');
});

// Editor routes
$routes->group("editor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Editor\Home::index");
    $routes->get('submissions/(:num)', 'Editor\Submissions\Home::index/$1');
    $routes->get('submissions/assignEditor/(:num)/(:num)', 'Editor\Submissions\AssignEditor::index/$1/$2');
    $routes->get('submissions/deleteEditAssignment/(:num)', 'Editor\Submissions\DeleteEditAssignment::index/$1');
    $routes->get('submissionReview/(:num)', 'Editor\SubmissionReview::index/$1');
    $routes->get('selectReviewer/(:num)', 'Editor\selectReviewer::index/$1');
    $routes->get('selectReviewer/(:num)/(:num)', 'Editor\selectReviewer::index/$1/$2');
    $routes->get('viewMetadata/(:num)', 'Editor\viewMetadata::index/$1');
    $routes->get('submissionEditing/(:num)', 'Editor\submissionEditing::index/$1');
    $routes->add('notifyReviewer/(:num)/(:num)', 'Editor\notifyReviewer::index/$1/$2');
    $routes->get('emailEditorDecisionComment/(:num)', 'Editor\emailEditorDecisionComment::index/$1');
    $routes->get('viewEditorDecisionComments/(:num)', 'Editor\viewEditorDecisionComments::index/$1');
    $routes->get('deleteComment/(:num)', 'Editor\deleteComment::index/$1');
    $routes->get('clearReview/(:num)/(:num)', 'Editor\clearReview::index/$1/$2');
    $routes->get('removeIssue/(:num)', 'Editor\removeIssue::index/$1');
    $routes->add('scheduleForPublication/(:num)', 'Editor\scheduleForPublication::index/$1');
    $routes->add('setDatePublished/(:num)', 'Editor\setDatePublished::index/$1');
    $routes->add('issueToc/(:num)', 'Editor\issueToc::index/$1');
    $routes->add('updateIssueToc/(:num)', 'Editor\updateIssueToc::index/$1');
    $routes->add('initiateCopyedit/(:num)', 'Editor\initiateCopyedit::index/$1');
    $routes->add('completeCopyedit/(:num)', 'Editor\completeCopyedit::index/$1');
    $routes->add('notifyAuthorCopyedit/(:num)', 'Editor\notifyAuthorCopyedit::index/$1');
    $routes->add('thankAuthorCopyedit/(:num)', 'Editor\thankAuthorCopyedit::index/$1');
    $routes->get('completeFinalCopyedit/(:num)', 'Editor\completeFinalCopyedit::index/$1');
    $routes->get('deleteGalley/(:num)', 'Editor\DeleteGalley::index/$1');
    $routes->get('deleteSuppFile/(:num)', 'Editor\DeleteSuppFile::index/$1');
    $routes->get('unPublishIssueToc/(:num)', 'Editor\unPublishIssueToc::index/$1');
    $routes->get('removeIssue/(:num)', 'Editor\removeIssue::index/$1');
});

// Reviewer routes
$routes->group("reviewer", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Reviewer\Home::index");
    $routes->get('submission/(:num)', 'Reviewer\Submission::index/$1');
    $routes->get('confirmReview/accept/(:num)', 'Reviewer\ConfirmReview::accept/$1');
    $routes->get('confirmReview/decline/(:num)', 'Reviewer\ConfirmReview::decline/$1');
    $routes->get('viewPeerReviewComments/(:num)', 'Reviewer\ViewPeerReviewComments/$1');
});

// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Admin\Home::index");
    $routes->get('detailUser/(:num)', 'Admin\DetailUser::index/$1');
    $routes->post('changeUserPassword', 'Admin\ChangeUserPassword::index');
    $routes->get('deleteUser/(:num)', 'Admin\DeleteUser::index/$1');
});

$routes->get('/issue/view/(:num)', 'Issue\view::index/$1');
$routes->get('/article/view/(:num)', 'Article\view::index/$1');

$routes->get('logout', 'User::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
