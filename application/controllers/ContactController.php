<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 15/02/15
 * Time: 12:09
 */

/**
 * Class ContactController
 */
class ContactController extends AbstractController
{
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Display all contacts
     */
    public function indexAction()
    {
        /*if (isset($_GET['add-property'])) {

            $counties = ['Antrim', 'Armagh', 'Carlow', 'Cavan', 'Clare', 'Cork', 'Derry', 'Donegal', 'Down', 'Dublin', 'Fermanagh', 'Galway', 'Kerry', 'Kildare', 'Kilkenny', 'Laois', 'Leitrim', 'Limerick', 'Longford', 'Louth', 'Mayo', 'Meath', 'Monaghan', 'Offaly', 'Roscommon', 'Sligo', 'Tipperary', 'Tyrone', 'Waterford', 'Westmeath', 'Wexford', 'Wicklow'];
            $cities   = ['Cork', 'Galway', 'Tralee', 'Tallaght', 'Naas', 'Limerick', 'Ennis', 'Waterford', 'Balbriggan', 'Swords', 'Sligo', 'Dundalk', 'Newbridge', 'Drogheda', 'Clonmel', 'Navan', 'Athlone'];

            for ($i = 0; $i < 1000000; $i++) {
                $building = rand(1, 200);
                $street   = $this->generateRandomString(25);
                $county   = $counties[array_rand($counties)];
                $city     = $cities[array_rand($cities)];

                $propertyModel = new PropertyModel();
                $propertyModel->setBuildingNumber($building);
                $propertyModel->setStreet($street);
                $propertyModel->setCounty($county);
                $propertyModel->setCity($city);
                $propertyModel->setAddedBy(2);
                $propertyModel->setAddedAt(date('Y-m-d H:i:s'));
                $propertyModel->setActive('y');
                $propertyModel->save();
            }
        }*/

        try {
            // instantiate model, this will connect to db
            $contactModel = new ContactModel();

            // retrieve all contacts from db
            $allContacts = $contactModel->find();

            // load view and pass data into it
            $this->loadView('contact/index', ['contacts' => $allContacts]);

        } catch (\Exception $e) {

            // on any exception - apply global error handler,
            // and display default error page
            $this->handleError($e);
        }
    }
}
