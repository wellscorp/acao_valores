'doctrine' => array(
'driver' => array(
    __NAMESPACE__ . '_driver' => array(
        'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
        'cache' => 'array',
        'paths' => array(__DIR__ . '\..\src\\' . __NAMESPACE__ . '\Entities')
        ),
    'orm_default' => array(
        'drivers' => array(
            __NAMESPACE__ . '\Entities' => __NAMESPACE__ . '_driver'
            )
        ),
    'oracle_driver' => array(
        'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
        'cache' => 'array',
        'paths' => array(__DIR__ . '\..\src\\' . __NAMESPACE__ . '\Entities\Oracle')
        ),
    'orm_oracle' => array(
        'drivers' => array(
            __NAMESPACE__ . '\Entities\Oracle' => 'oracle_driver'
            )
        ),
    'microsoft_driver' => array(
        'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
        'cache' => 'array',
        'paths' => array(__DIR__ . '\..\src\\' . __NAMESPACE__ . '\Entities\Microsoft')
        ),
    'orm_microsoft' => array(
        'drivers' => array(
            __NAMESPACE__ . '\Entities\Microsoft' => 'microsoft_driver'
            )
        )
    )
)