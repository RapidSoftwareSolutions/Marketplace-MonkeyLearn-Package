<?php
$routes = [
    'metadata',
    'classify',
    'classifyMulti',
    'getClassifiers',
    'getSingleClassifier',
    'createClassifierCategory',
    'updateClassifierCategory',
    'deleteClassifierCategory',
    'uploadSamplesToCategory',
    'uploadSamplesToMultiCategory',
    'trainClassifier',
    'deployClassifier',
    'createClassifier',
    'deleteClassifier',
    'extractKeywordsInEnglish',
    'extractKeywordsInSpanish',
    'extractTextFromBinary',
    'extractTextFromHTML',
    'extractEntities',
    'extractEntitiesInSpanish',
    'executePipeline'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

