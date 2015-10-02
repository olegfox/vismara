<?php
namespace Site\MainBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Site\MainBundle\Entity\Image as Image;

class GalleryAdminController extends Controller
{

    public function createAction()
    {
// the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->submit($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->create($object);
                $gallery = $object;
                $imagesJson = $this->get('request')->get('gallery');
                if ($imagesJson != "") {
                    $images = json_decode($imagesJson);
                    $em = $this->getDoctrine()->getManager();
                    foreach ($images as $image) {
                        $imageObject = new Image();
                        $imageObject->setMimeType(mime_content_type("uploads/" . $image));
                        $imageObject->setName($image);
                        $imageObject->setSrc("uploads/" . $image);
                        $this->get('image.handling')->open("uploads/" . $image)
                            ->cropResize(1920, 1080)
                            ->save("uploads/" . $image);
                        $width = $this->get('image.handling')->open("uploads/" . $image)->width() - 170;
                        $height = $this->get('image.handling')->open("uploads/" . $image)->height() - 48;
                        $this->get('image.handling')->open("uploads/" . $image)
                            ->merge($this->get('image.handling')->open("sitemain/img/water.png"), $width, $height, 170, 48)
                            ->save("uploads/min" . $image);
                        $imageObject->setMinSrc("uploads/min" . $image);
                        $imageObject->setGallery($gallery);
                        $em->persist($imageObject);
                    }
                    $em->flush();
                }
                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_create_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form' => $view,
            'object' => $object,
        ));
    }

    public function editAction($id = NULL)
    {
        $result = parent::editAction($id);
        $gallery = $this->admin->getObject($this->get('request')->get($this->admin->getIdParameter()));
        $em = $this->getDoctrine()->getManager();
        if ($this->get('request')->getMethod() == 'POST') {
            $imagesJson = $this->get('request')->get('gallery');
            if ($imagesJson != "") {
                $images = json_decode($imagesJson);
                foreach ($images as $image) {
                    $imageObject = new Image();
                    $imageObject->setMimeType(mime_content_type("uploads/" . $image));
                    $imageObject->setName($image);
                    $imageObject->setSrc("uploads/" . $image);
                    $this->get('image.handling')->open("uploads/" . $image)
                        ->cropResize(1920, 1080)
                        ->save("uploads/" . $image);
                    $width = $this->get('image.handling')->open("uploads/" . $image)->width() - 170;
                    $height = $this->get('image.handling')->open("uploads/" . $image)->height() - 48;
                    $this->get('image.handling')->open("uploads/" . $image)
                        ->merge($this->get('image.handling')->open("sitemain/img/water.png"), $width, $height, 170, 48)
                        ->save("uploads/min" . $image);
                    $imageObject->setMinSrc("uploads/min" . $image);
                    $imageObject->setGallery($gallery);

                    $em = $this->getDoctrine()->getManager();
                    $query = $em->createQuery('SELECT i FROM SiteMainBundle:Image i ORDER BY i.position DESC');
                    try{
                        $res = $query->setFirstResult(0)->setMaxResults(1)->getOneOrNullResult();
                        $lastPosition = $res->getPosition();
                    } catch(Exception $e) {
                        $lastPosition = 0;
                    }

                    $imageObject->setPosition($lastPosition + 1);

                    $em->persist($imageObject);
                }
                $em->flush();
            }
        }

        foreach($gallery->getImages() as $image){
            if($image->getImageName() != ''){
                $pathinfo = pathinfo($image->getMinSrc());
                $newFileName = 'uploads/' . $image->getImageName() . '.' . $pathinfo['extension'];
                if(!file_exists($newFileName)){
                    rename($image->getMinSrc(), $newFileName);
                    $image->setMinSrc($newFileName);
                    $em->flush();
                }
            }
        }

        return $result;
    }
}