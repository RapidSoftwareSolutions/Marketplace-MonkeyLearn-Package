[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/MonkeyLearn/functions?utm_source=RapidAPIGitHub_MonkeyLearnFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# MonkeyLearn Package

* Domain: monkeylearn.com
* Credentials: apiToken

## How to get credentials: 
0. Item one 
1. Item two
 
## MonkeyLearn.classify
This endpoint allows you to perform the classification of many text samples using only one request to a custom or public module.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier. Example: cl_5icAVzKR
| text        | String     | The text that you want to classify
| sandbox     | Boolean    | Set this parameter to true if you want to use the sandbox to perform the classification.
| debug       | Boolean    | Set this parameter to true if you want to use the debug output.y

## MonkeyLearn.classifyMulti
This endpoint allows you to perform the classification of many text samples using only one request to a custom or public module that you have already installed. In order for this endpoint to work, the module has to be set as a Multilabel Module.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier
| textList    | Array      | List of the texts which you want to classify. Example: ['First text to classify','Second text to classify']
| sandbox     | Boolean    | Set this parameter to true if you want to use the sandbox to perform the classification.
| debug       | Boolean    | Set this parameter to true if you want to use the debug output.y

## MonkeyLearn.getClassifiers
This endpoint returns the classifier and it’s sandbox categories attributes.

| Field   | Type       | Description
|---------|------------|----------
| apiToken| credentials| The api key obtained from Monkey Learn

## MonkeyLearn.getSingleClassifier
This endpoint returns the classifier and it’s sandbox categories attributes.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier

## MonkeyLearn.createClassifierCategory
This endpoint creates a new category on the tree. You have to select a name and a parent category.

| Field    | Type       | Description
|----------|------------|----------
| apiToken | credentials| The api key obtained from Monkey Learn
| projectId| String     | ID of the project
| name     | String     | Category name
| parentId | String     | ID of parent category

## MonkeyLearn.updateClassifierCategory
This endpoint edits a category from the tree on a classifier.

| Field     | Type       | Description
|-----------|------------|----------
| apiToken  | credentials| The api key obtained from Monkey Learn
| projectId | String     | ID of the project
| categoryId| String     | ID of category
| name      | String     | Category name
| parentId  | String     | ID of parent category

## MonkeyLearn.deleteClassifierCategory
This endpoint deletes a category from the tree. This action cannot be undone.

| Field            | Type       | Description
|------------------|------------|----------
| apiToken         | credentials| The api key obtained from Monkey Learn
| projectId        | String     | ID of the project
| categoryId       | String     | Category id
| samplesStrategy  | String     | Parameter can have 2 values: “move-to-parent” or “move-to”. If you select “move-to” then also have to set the “samples-category-id” paremeter with the id of the category where you want to move the samples.
| samplesCategoryId| String     | Category id

## MonkeyLearn.uploadSamplesToCategory
This endpoints allows you to upload samples to the categories.

| Field    | Type       | Description
|----------|------------|----------
| apiToken | credentials| The api key obtained from Monkey Learn
| projectId| String     | ID of the project
| samples  | String     | A list of dictionaries with the sample text (text property) and the ID of the category that sample should be saved (category_id property). The category IDs can be retrived using the classifier detail endpoint. Example: [{"text":"Example sample test 1 to category","category_id":17145562}]

## MonkeyLearn.uploadSamplesToMultiCategory
This endpoints allows you to upload samples to one or more categories.

| Field    | Type       | Description
|----------|------------|----------
| apiToken | credentials| The api key obtained from Monkey Learn
| projectId| String     | ID of the project
| samples  | String     | A list of dictionaries with the sample text (text property) and the ID of the category that sample should be saved (category_id property). The category IDs can be retrived using the classifier detail endpoint. Example: [{"text":"Example sample asdasdasdtest asdasd1 to category","category_id":[17145562]}]

## MonkeyLearn.trainClassifier
This endpoint allows you to train a classifier.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier

## MonkeyLearn.deployClassifier
This endpoint allows you to deploy the current sandbox classifier as the live classifier. Note that the old live classifier will be overwritten.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier

## MonkeyLearn.createClassifier
This endpoint creates a new classifier.

| Field           | Type       | Description
|-----------------|------------|----------
| apiToken        | credentials| The api key obtained from Monkey Learn
| name            | String     | Classifier name
| description     | String     | Classifier description
| trainState      | String     | Train state. TRAINED or UNTRAINED
| language        | String     | This setting should match the language in your samples. Default: en
| ngramRange      | String     | N-gram range sets if features to be used to characterize texts will be Unigrams, Bigrams or Trigrams. Example: 1-1
| useStemmer      | Boolean    | This setting sets if words should be stemmed. The stemming process transforms words into their root form, so inflected and derived words are grouped together. Default: true
| stopWords       | String     | Stopwords are words that usually do not contribute as classification features. Example: soft,it
| maxFeatures     | Number     | This sets the maximum number of features to be used to characterize texts in the training/classification process. 
| stripStopwords  | Boolean    | Strip 
| isMultilabel    | Boolean    | Define if the module is single-label (default) or multi-label. You can only set this option when you first create the module and you cannot change it later.
| normalizeWeights| Boolean    | Weights normalize
| classifier      | String     | Use this setting to choose which classification algorithm you want to use for this classifier. 

## MonkeyLearn.deleteClassifier
This endpoint deletes a classifier. This action cannot be undone.

| Field       | Type       | Description
|-------------|------------|----------
| apiToken    | credentials| The api key obtained from Monkey Learn
| classifierId| String     | ID of the classifier

## MonkeyLearn.extractKeywordsInEnglish
Extract keywords from a list of texts in English.

| Field          | Type       | Description
|----------------|------------|----------
| apiToken       | credentials| The api key obtained from Monkey Learn
| textList       | Array      | A list of texts from which to extract keywords. Example: ["Monkeylearn is a Text Mining toolkit.", "This is a very good extractor"]
| maxKeywords    | Number     | The maximum amount of keywords to extract, defaults to 10.
| useStemming    | Boolean    | Take words to their base form in order to get better results , defaults to true.
| useIdfs        | Boolean    | Use a language model for computing the Inverse Document Frequencies, defaults to true.
| lowercase      | Boolean    | Lowercase all the given text, defaults to false.
| useCompanyNames| Boolean    | Expand company names, if in the text appears the word ‘Google’ and in other part appears ‘Google Inc.’, the word ‘Google’ will be expanded to ‘Google Inc.’. Defaults to false.
| expandAcronyms | Boolean    | Expand acronyms to they full form, for example ‘USA’ to ‘United States of America’ if both tokens appear in the given text. Defaults to false.
| keepAmpersand  | Boolean    | Keep the ‘&’ char when it appears inside a name. For example ‘Ferrara & Wolf’. Defaults to false.

## MonkeyLearn.extractKeywordsInSpanish
Extract keywords from a list of texts in Spanish.

| Field      | Type       | Description
|------------|------------|----------
| apiToken   | credentials| The api key obtained from Monkey Learn
| textList   | Array      | A list of texts from which to extract keywords. 
| maxKeywords| Number     | The maximum amount of keywords to extract, defaults to 10.

## MonkeyLearn.extractTextFromBinary
Extract plain text from binary documents as .doc, .docx, .pdf and .odt.

| Field   | Type       | Description
|---------|------------|----------
| apiToken| credentials| The api key obtained from Monkey Learn
| file    | File       | The binary file from which to extract the text.

## MonkeyLearn.extractTextFromHTML
Extract relevant text from a list of HTML’s. This algorithm can be used to detect and remove the surplus “clutter” (boilerplate, templates) around the main textual content of a web page.

| Field   | Type       | Description
|---------|------------|----------
| apiToken| credentials| The api key obtained from Monkey Learn
| html    | String     | HTML from which to extract the texts. Example: '<html><body><h1>New products and services are released every month that dramatically change how we can develop products and manage our IT shops. Innovation is everywhere; it can be hard to keep up, but that is part of the fun</h1></body></html>'

## MonkeyLearn.extractEntities
Extract Entities from a list of texts using Named Entity Recognition (NER). NER labels sequences of words in a text which are the names of things, such as person and company names. This implementation labels 3 classes: PERSON, ORGANIZATION and LOCATION.

| Field   | Type       | Description
|---------|------------|----------
| apiToken| credentials| The api key obtained from Monkey Learn
| textList| Array      | A list of texts from which to extract the entities. Example: ["Juan lives in Uruguay.", "Monica lives in the USA."]

## MonkeyLearn.extractEntitiesInSpanish
Extract Entities from a list of texts in Spanish using Named Entity Recognition (NER). NER labels sequences of words in a text which are the names of things, such as person and company names. This implementation labels 4 classes: PERS, ORG, LUG and OTROS.

| Field   | Type       | Description
|---------|------------|----------
| apiToken| credentials| The api key obtained from Monkey Learn
| textList| Array      | A list of texts from which to extract the entities. Example: ["Juan vive en Uruguay.", "Monica vive en USA."]

## MonkeyLearn.executePipeline
Executes the selected pipeline.

| Field     | Type       | Description
|-----------|------------|----------
| apiToken  | credentials| The api key obtained from Monkey Learn
| pipelineId| String     | A list of texts from which to extract the entities.
| data      | Json       | Depends on the pipeline definition. The JSON you post here will be used as the initial state of the Pipeline.

