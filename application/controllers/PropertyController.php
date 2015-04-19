<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 11/04/15
 * Time: 14:21
 */

use Respect\Validation\Validator as v;

/**
 * Class PropertyController
 */
class PropertyController extends AbstractController
{
    /**
     * Add property
     */
    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {

            // retrieve sanitised params from the request
            $params = $request->getParams();

            // validate params, this will exit and send errors if any detected
            $this->validateParams($params);

            // create new property
            try {
                $property = new PropertyModel();
                $property->setBuildingNumber($params['buildingNumber']);
                $property->setStreet($params['street']);
                $property->setCity($params['city']);
                $property->setCounty($params['county']);

                // see if property already exists,
                // if yes - return an error
                if ($property->exists()) {
                    $this->handleJsonError('Property already exists');
                }

                // property validated and doesn't exists yet,
                // save it do db now
                $property->setAddedAt(date(MYSQL_DATE_TIME_FORMAT));
                $property->setAddedBy(0);
                $property->setActive('y');
                $id = $property->save();
            } catch (\Exception $e) {
                $this->handleJsonError($e->getMessage());
            }

            // return JSON response
            $this->sendJson([
                'status'   => 'ok',
                'msg'      => 'Property added successfully',
                'property' => $property->toString(),
                'id'       => $id,
            ]);
        }
    }

    /**
     * @param array $params
     */
    private function validateParams(array $params)
    {
        $errors = [];

        if (!v::int()->notEmpty()->between(1, 50000)->validate($params['buildingNumber'])) {
            $errors[] = 'Building number must be a valid integer between 1 and 50000';
        }

        if (!v::string()->notEmpty()->length(3, 125)->validate($params['street'])) {
            $errors[] = 'Street should contain from 3 to 125 characters';
        }

        if (!v::string()->notEmpty()->length(3, 125)->validate($params['city'])) {
            $errors[] = 'City should contain from 3 to 125 characters';
        }

        if (!v::string()->notEmpty()->length(3, 125)->validate($params['county'])) {
            $errors[] = 'County should contain from 3 to 125 characters';
        }

        if (count($errors)) {
            $this->handleJsonError($errors);
        }
    }
}
