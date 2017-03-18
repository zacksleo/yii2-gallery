<?php

namespace zacksleo\yii2\gallery\models;

use yii\db\ActiveQuery;

/**
 * Class Query
 * @package sadovojav\gallery\models
 */
class Query extends ActiveQuery
{
    /**
     * @param bool $state
     * @return $this
     */
    public function active($state = true)
    {
        $this->andWhere(['status' => $state]);

        return $this;
    }
}
