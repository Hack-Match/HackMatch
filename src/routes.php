<?php declare(strict_types=1);

use Slim\Http\Request;
use Slim\Http\Response;
use CodeBuddies\AppGlobals;
use CodeBuddies\ModelUsers;

if(AppGlobals::inDebugMode()) {
    echo "\n <br> [ HACK MATCH IN DEBUG MODE ] <br> \n";
    // ?add-random-looking-for=true
    $_SERVER['REQUEST_URI'] = '/test/get-matched/show-matches';
    $_SERVER['REQUEST_METHOD'] = 'POST';
}

// This helps PhpStorm's "require" intelisense in the routes
$bp = 'src/zce'; // base path

/**
 * I'm calling these functions "ops" , to better move "ops" around to different routes
 * -- REMEMBER: Update the "return" statement when moving ops around. --
 *
 * @param $obj
 * @param $request
 *
 * @return array
 */
function matchedLookForData($obj, $request): array {
    //TODO: look into maybe creating a singleton for classes that are used often
    $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $obj->dbLocal : $obj->dbProduction;
    // ->logger is an object
    $usersModel = new ModelUsers($dbCodeBuddiesConnect, $obj->logger);
    
    $parsedBody = $request->getParsedBody();
    $debugMockData = AppGlobals::debugMatchLookingFor()['data'];
    $webFormLookingFor = AppGlobals::inDebugMode() ? $debugMockData : $parsedBody;
    //if(AppGlobals::$appFromRoutePhp) AppGlobals::createFileOfData($parsedBody); // true to print
    
    // persist state
    $cUser = $_SESSION['codeUser'] ?? 'debug_mode';
    
    // insert data into sql db
    $insertResult = $usersModel->insertLookingFor($webFormLookingFor, $cUser);
    
    // get all users from db to pass to the match function
    $dbAllUsersLookFor = $usersModel->getUsersLookFor();
    $result = $usersModel->matchLookingFor($webFormLookingFor, $dbAllUsersLookFor);
    $result['codeUser'] = $obj->codeUser;
    $result['insert'] = $insertResult;
    
    // just to be safe
    unset($obj->logger);
    unset($obj);
    
    //
    return $result;
}

/**
 * return an array of the vars that contain the content to output in the
 * AngularJS content for dynamic tabs
 *
 * @param $definedVars
 * @param $prefix
 *
 * @return array
 */
function contentVars($definedVars, $prefix): array {
    $lambda = fn($v, $key) => false === strpos($key, '_path') && false !== strpos($key, $prefix);
    return array_filter($definedVars, $lambda, ARRAY_FILTER_USE_BOTH);
}

#region - GROUP: Julius Portfolio app routes
$app->group('/julius', function($app) {
    
    $app->get('/about', function($request, $response, $args) {
        return $this->view->render($response, 'julius/temp.about-julius.phtml', ['hi' => 'world']);
    });
    
    $app->get('/edu', function($request, $response, $args) {
        return $this->view->render($response, 'julius/temp.edu.phtml', ['hi' => 'world']);
    });
    
    $app->get('/learn', function($request, $response, $args) {
        return $this->view->render($response, 'julius/temp.learn.phtml', ['hi' => 'world']);
    });
    
    $app->get('/build', function($request, $response, $args) {
        return $this->view->render($response, 'julius/temp.build.phtml', ['hi' => 'world']);
    });
    
    /******************************************************
     ************** ENGINEERING SKILLS ROUTES **************
     ******************************************************/
    
    $app->get('/basics', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->bas;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/basics";
        $bas = [
            //'bas' => $t,
            $t->intro => require "$path/basics_intro.php",
            $t->config => require "$path/configuration.php",
            $t->control => require "$path/control_structures.php",
            $t->ext => require "$path/extensions.php",
            $t->id => require "$path/identifiers.php",
            $t->lang => require "$path/language_constructs.php",
            $t->name => require "$path/namespaces.php",
            $t->op => require "$path/operators.php",
            $t->per => require "$path/performance.php",
        ];
        return $this->view->render($response, 'eng/temp.basics.phtml', $bas);
    });
    
    $app->get('/oop', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->oop;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/oop";
        $data = [
            //'oop' => $t,
            $t->adv_oop => require "$path/advanced_oop.php",
            $t->anon => require "$path/anonymous_objects.php",
            $t->auto => require "$path/auto_loading.php",
            $t->bas_oop => require "$path/basic_oop.php",
            $t->gen => require "$path/generators.php",
            $t->in => require "$path/inheritance.php",
            $t->late => require "$path/late_static_binding.php",
            $t->loop => require "$path/loop_compare.php",
            $t->magic => require "$path/magic_methods.php",
            $t->intro => require "$path/oop_intro.php",
            $t->reflect => require "$path/reflection.php",
            $t->spl => require "$path/spl.php",
            $t->trait => require "$path/traits.php",
            $t->try => require "$path/try_catch.php",
        ];
        return $this->view->render($response, 'eng/temp.oop.phtml', $data);
    });
    
    $app->get('/security', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->sec;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/security";
        $data = [
            //'sec' => $t,
            $t->enc => require "$path/encryption_hashing.php",
            $t->file => require "$path/file_upload_security.php",
            $t->filter => require "$path/filter_escape.php",
            $t->https => require "$path/https.php",
            $t->per => require "$path/permissions.php",
            $t->rem => require "$path/remote_code_injection.php",
            $t->intro => require "$path/security_intro.php",
            $t->ses => require "$path/session_security.php",
            $t->sql => require "$path/sql_injection.php",
            $t->xsrf => require "$path/xsrf.php",
            $t->xss => require "$path/xss.php",
        ];
        return $this->view->render($response, 'eng/temp.security.phtml', $data);
    });
    
    $app->get('/arrays', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->arr;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/arrays";
        $data = [
            //'arr' => $t,
            $t->intro => require "$path/array_intro.php",
            $t->ops => require "$path/array_ops.php",
            $t->loop => require "$path/looping.php",
            $t->merge => require "$path/merge_compare.php",
            $t->sort => require "$path/sorting.php",
            $t->spl => require "$path/spl.php",
            $t->stack => require "$path/stack_queue.php",
            $t->tr => require "$path/transforms.php",
            $t->key => require "$path/key_values.php",
        ];
        return $this->view->render($response, 'eng/temp.arrays.phtml', $data);
    });
    
    $app->get('/strings', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->str;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $str_path = "$bp/strings";
        $data = [
            //'str' => $t,
            $t->enc => require "$str_path/encodes.php",
            $t->ext => require "$str_path/extracting.php",
            $t->form => require "$str_path/formatting.php",
            $t->here => require "$str_path/heredoc_nowdoc.php",
            $t->pho => require "$str_path/phonetic.php",
            $t->reg_adv => require "$str_path/regex_engine_advanced.php",
            $t->reg_bas => require "$str_path/regex_engine_basics.php",
            $t->reg_int => require "$str_path/regex_engine_intermediate.php",
            $t->search => require "$str_path/search_compare.php",
            $t->intro => require "$str_path/string_intro.php",
            $t->tr => require "$str_path/transforms.php",
            $t->word => require "$str_path/word_char_count.php",
        ];
        return $this->view->render($response, 'eng/temp.strings.phtml', $data);
    });
    
    $app->get('/functions', function($request, $response, $args) {
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $fp_path = "$bp/functions"; // Functional Programming
        $data = [
            //'fp' => $t,
            'fp_intro' => require "$fp_path/functions_intro.php",
            'fp_parametric_rules' => require "$fp_path/parametric_rules.php",
            'fp_lambdas_closures' => require "$fp_path/lambas_closures.php",
            'fp_callable_class' => require "$fp_path/callable_class.php",
            'fp_references' => require "$fp_path/references.php",
            'fp_scope' => require "$fp_path/scope.php",
            'fp_variadic_dynamic' => require "$fp_path/variadic_dynamic.php",
        ];
        return $this->view->render($response, 'eng/temp.functions.phtml', $data);
    });
    
    $app->get('/web', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->web;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/web";
        $data = [
            //'web' => $t,
            $t->enc => require "$path/encode_decode.php",
            $t->file => require "$path/file_uploads.php",
            $t->forms => require "$path/html_forms.php",
            $t->auth => require "$path/http_authentication.php",
            $t->req_res => require "$path/http_requests_responses.php",
            $t->net => require "$path/network_functions.php",
            $t->ob => require "$path/output_buffer.php",
            $t->ses => require "$path/sessions.php",
            $t->sup => require "$path/super_globals.php",
            $t->intro => require "$path/web_intro.php",
        ];
        return $this->view->render($response, 'eng/temp.web.phtml', $data);
    });
    
    $app->get('/data', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->dat;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/data";
        $data = [
            //'dat' => $t,
            $t->intro => require "$path/data_intro.php",
            $t->ds => require "$path/data_structures.php",
            $t->date => require "$path/date_time.php",
            $t->json => require "$path/json.php",
            $t->rest => require "$path/rest.php",
            $t->soap => require "$path/soap.php",
            $t->xml => require "$path/xml.php",
        ];
        return $this->view->render($response, 'eng/temp.data.phtml', $data);
    });
    
    $app->get('/errors', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->err;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/errors";
        $data = [
            $t->cust => require "$path/custom_errors.php",
            $t->er_class => require "$path/error_class.php",
            $t->config => require "$path/config.php",
            $t->func => require "$path/error_functions.php",
            $t->type => require "$path/error_types.php",
            $t->intro => require "$path/errors_intro.php",
            $t->ex_class => require "$path/exception_class.php",
            $t->throw => require "$path/throwable.php",
            $t->try => require "$path/try_catch_finally.php",
        ];
        return $this->view->render($response, 'eng/temp.errors.phtml', $data);
    });
    
    $app->get('/sql', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->sql;
        $bp = $this->julius_portfolio_app_example_code_base_path;
        $path = "$bp/sql";
        $data = [
            $t->agg => require "$path/aggregates.php",
            $t->crud => require "$path/crud_ops.php",
            $t->def => require "$path/data_definitions.php",
            $t->type => require "$path/data_types.php",
            $t->grp => require "$path/grouping.php",
            $t->join => require "$path/joins.php",
            $t->key => require "$path/keys_indexes.php",
            $t->pdo_me => require "$path/pdo_fetch_methods.php",
            $t->pdo_mo => require "$path/pdo_fetch_modes.php",
            $t->prep => require "$path/prepared_statements.php",
            $t->intro => require "$path/sql_db_intro.php",
            $t->tr => require "$path/transactions.php",
        ];
        return $this->view->render($response, 'eng/temp.sql.phtml', $data);
    });
    
    $app->get('/io', function($request, $response, $args) {
        $t = (new CodeBuddies\TopicsStruct())->io;
        $base = $this->julius_portfolio_app_example_code_base_path;
        $path = "$base/io";
        $data = [
            $t->intro => require "$path/io_intro.php",
            $t->stream => require "$path/stream.php",
            $t->resource => require "$path/fs_resource.php",
            $t->info => require "$path/fs_info_op.php",
        ];
        return $this->view->render($response, 'eng/temp.io.phtml', $data);
    });
    
    $app->get('/testing', function($request, $response, $args) {
        return $this->view->render($response, 'eng/temp.testing.phtml', ['hi' => 'world']);
    });
});
#endregion

#region --- simple test routes
$app->get('/hello/{name}', function(Request $request, Response $response, array $args) {
    $zName = $args['name'];
    $response->getBody()->write("Well, Ello There $zName");
    
    return $response;
});

$app->get('/test1', function(Request $request, Response $response) {
    $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $this->dbLocal : $this->dbProduction;
    $usersModel = new ModelUsers($dbCodeBuddiesConnect, $this->logger);
    $mockUsers = $usersModel->getUsersSkills();
    
    // construct a table real quick
    $table = "<table><tr><th>first_name</th><th>last_name</th><th>user_type</th><th>gender</th></tr>";
    foreach($mockUsers as $user) {
        [$first, $last, $userType, $gender] = $user;
        $table .= "<tr><td>f, $first</td><td>l, $last</td><td>u, $userType</td><td>g, $gender</td></tr>";
    }
    $table .= "</table>";
    $debug = 1;
    
    $response->getBody()->write($table);
    return $response;
});

$app->get('/user', function(Request $request, Response $response) {
    return $response->getBody()->write("Hello, user!");
});
#endregion --- simple test routes


#region -- test/add-random
/**
 * Add random skills to the mock_users table
 */
$app->get('/test/add-random/skills', function(Request $request, Response $response) {
    //TODO: look into maybe creating a singleton for classes that are used often
    $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $this->dbLocal : $this->dbProduction;
    $usersModel = new ModelUsers($dbCodeBuddiesConnect, $this->logger);
    $result = $usersModel->addSkillsToMockUsers();
    
    return $response->withJson($result);
});

/**
 * Add random "Looking For" options to the mock_users table
 */
$app->get('/test/add-random/looking-for', function(Request $request, Response $response) {
    //TODO: look into maybe creating a singleton for classes that are used often
    $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $this->dbLocal : $this->dbProduction;
    $usersModel = new ModelUsers($dbCodeBuddiesConnect, $this->logger);
    
    $result = $usersModel->addLookingForToMockUsers();
    $hadError = $result['x-cb-error'] ?? null;
    if(!is_null($hadError)) {
        $this->logger->error($result['x-cb-error']);
    }
    
    return $response->withJson($result);
});
#endregion -- test/add-random


#region -- CORE_TEST_ROUTES
//TODO: make /test/get-matched routes a group

/**
 * _1st View State.
 * It will ask the user what they're looking for e.g. "I am looking for:" ... then the options
 */
$app->get('/test/get-matched', function(Request $request, Response $response, array $args) {
    // quick cheap debug
    $name = $request->getQueryParam('name');
    
    $data = ['codeUser' => $this->codeUser, 'args' => $args, 'name' => $name];
    return $this->view->render($response, 'test/get-matched.phtml', $data);
});

/**
 * _2nd View State.
 * After the user answers what they are looking for, this view is rendered.
 * It'll ask "What skills can you help with?" and "What skills do you need help with?"
 */
$app->post('/test/get-matched/about-user', function(Request $request, Response $response, array $args) {
    $obj = clone $this;
    $obj->logger = $this->logger;
    
    //return $response->withJson($result); // return json for future API
    return $this->view->render($response, 'test/about-user.phtml', matchedLookForData($obj, $request));
});

/**
 * _3rd View State.
 * After user submits "About User" info, they enter their email and availability
 * - At the moment, it'll do the "Match Skills" op, then render the "contact-info" view.
 */
$app->post('/other/get-matched/contact-info', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'other/contact-info.phtml', []);
});

/**
 * _4th UI state. After the user answers what they are looking for, this view is rendered.
 * It'll ask "What skills can you help with?" and "What skills do you need help with?"
 */
$app->post("/test/get-matched/show-matches", function(Request $request, Response $response, array $args) {
    /**
     * I'm calling these closures "ops" , to better move "ops" around to different routes
     * -- REMEMBER: Update the "return" statement when moving ops around. --
     * @return array
     */
    $matchedSkillData = function() use ($request, $response): array {
        // data for debugging or a POST req
        $debugData = AppGlobals::debugMatchSkills()['data'];
        $parsedBody = $request->getParsedbody();
        $webFormSkills = AppGlobals::inDebugMode() ? $debugData : $parsedBody;
        if(AppGlobals::$appFromRoutePhp) AppGlobals::createFileOfData($parsedBody); // true to print
        
        //TODO: look into maybe creating a singleton for classes that are used often
        $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $this->dbLocal : $this->dbProduction;
        $usersModel = new ModelUsers($dbCodeBuddiesConnect, $this->logger);
        if(!AppGlobals::inDebugMode()) $usersModel->insertSkills($webFormSkills);
        $dbAllUsersSkills = $usersModel->getUsersSkills();
        $result = $usersModel->matchSkills($webFormSkills, $dbAllUsersSkills);
        $f = $usersModel->userMatchFields; // field names
        
        // just get the needed fields
        $matchedUsers = [];
        if(count($result) < 1) {
            $nm = 'no match';
            $matchedUsers[0] = [
                $f->first => $nm, $f->userType => $nm, $f->skillPct => $nm, $f->skillMatch => $nm,
            ];
        }
        
        unset($result); // free mem from buffer
        return $matchedUsers;
    };
    
    $allMatchedData = function() use ($request, $response): array {
        $debugData = AppGlobals::debugMatchSkills()['data'];
        $parsedBody = $request->getParsedBody();
        $webFormSkills = AppGlobals::inDebugMode() ? $debugData : $parsedBody;
        
        $dbCodeBuddiesConnect = AppGlobals::isLocal() ? $this->dbLocal : $this->dbProduction;
        $usersModel = new ModelUsers($dbCodeBuddiesConnect, $this->logger);
        //if(!AppGlobals::inDebugMode())
        $usersModel->insertSkills($webFormSkills);
        // selects [skills] and [looking_for] columns
        $dbUsersSkillsLookFor = $usersModel->getUsersSkillsLookFor();
        $allMatched = $usersModel->matchAll($webFormSkills, $dbUsersSkillsLookFor);
        $debug = 1;
        
        // now sort and just get the top 20 matches, eventually do this in JS
        return $usersModel->sortAllMatches($allMatched);
    };
    
    // render a table rather than a bunch of json
    return $this->view->render($response, 'test/show-matches.phtml', $allMatchedData());
});
#endregion - CORE_TEST_ROUTES

$hi = 'ROOT_SCOPE says "hi!"';

#region - Security1 Practice routes
$app->group('/security1', function(\Slim\App $app) {
    // simple test route
    $app->get('/one', function($request, Response $response) {
        return $response->getBody()->write('hi there! This is the /one route :)');
    });
    
    /**GET
     * route 1a, security practice
     *
     * Is a "name form"
     */
    $app->get('/get-matched', function(Request $request, Response $response, array $args) {
        $name = $_SESSION['name'] ?? null;
        $data = ['codeUser' => $this->codeUser, 'args' => $args, 'name' => $name];
        return $this->view->render($response, 'security1/get-matched.phtml', $data);
    });
    
    /** POST **
     * route 1b, security practice
     *
     * Is a "name form"
     */
    $app->post('/get-matched', function(Request $request, Response $response, array $args) {
        // sort of the $_SESSION ctrl right now.
        if(!isset($_SESSION['name'])) {
            $_SESSION['name'] = $request->getParsedBodyParam('name');
        }
        $name = $_SESSION['name'] ?? null;
        
        $data = ['codeUser' => $this->codeUser, 'args' => $args, 'name' => $name];
        return $this->view->render($response, 'security1/get-matched.phtml', $data);
    });
    
    
    /** POST **
     * route 2, security practice
     * No "name form"
     */
    $app->post('/about-user', function(Request $request, Response $response, array $args) {
        $obj = clone $this;
        $obj->logger = $this->logger;
        
        //return $response->withJson($result); // return json for future API
        return $this->view->render($response, 'security1/about-user.phtml', matchedLookForData($obj, $request));
    });
    
});
#endregion - Security Practice routes


#region -- Single Pages
$app->get("/about", function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'about.phtml', []);
});
#endregion -- Single Pages

#region --- GROUP: get-matched
/***********************************
 * The Routes we'll probably need *
 **********************************
 * -- based on my analysis of the UX from http://cbconnect.herokuapp.com/apply --
 * GET https://codebuddies.co/api/get-matched/looking-for?x=y&w=z
 * GET https://codebuddies.co/api/get-matched/about-user?x=y&w=z
 * GET https://codebuddies.co/api/get-matched/see-matches?x=y&w=z
 */
$app->group('/get-matched', function(\Slim\App $app) {
    // we can read and write data using GET & POST verbs, but initially it'll be easier to just use GET
    /*
        -- Query String for "what the user is looking for" --
        ?code-acc-partner=false
            &mentor=true
            &mentee=false
            &open-source-proj=true
            &more-details=was%20hoping%20for%20people%20using%20laravel%20or%20phalconphp
    
        -- notes --
        Should use multi-select, not a radio buttons
    */
    $app->get('/looking-for', \CodeBuddies\ActionMatchLookingFor::class);
    
    /*
        -- Query String for "about who the user is" --
        ?name=julius
            &one-line=php%20all%20day
            &strong-skills=php%2Ccomputer%20science%2C%20algorithms%2C%20node.js%2C%20microsoft%20excel
            &weak-skills=combinatorics%2C%20statistics%2C%20binary%20tree%27s%2C%20recursion
    
        -- notes --
        [strong_skills] and [weak_skills] should be an autocomplete for normalized input
    */
    $app->get('/about-user', \CodeBuddies\ActionMatchAboutUser::class);
    
    /*
        -- Query String for "seeing who the user matched with" --
        ?email=phpninja@mail.com
            &time-zone=Pacific_standard
            &days-avail=mon%2C%20thur%2C%20fri
            &time-avail=7pm-8pm
    
        -- notes --
        1. [days_avail] and [time_avail] should initially just be drop down options, a more sophisticated UI may be
        difficult to implement
        2. By this point, we have made 2 requests to the PHP 7.4 API so we can have a little widget in the corner
            showing how many matches they have to entice them click the "See Matches" button ^_^
    */
    $app->get('/see-matches', \CodeBuddies\ActionMatchSeeMatches::class);
});
#endregion --- get-matched group


#region -- Root Route
$app->get('/[{name}]', function(Request $request, Response $response, array $args) {
    $name = $args['name'] ?? null;
    // 'julius-alvarado'
    $myNames = [
        'julius-alvarado', 'julius-hernandez', 'j-hernandez', 'j-alvarado', 'julius',
        'julius-hernandez-alvarado', 'j-hernandez-alvarado', 'hernandez', 'alvarado',
    ];
    if($name && in_array($name, $myNames)) {
        return $this->view->render($response, 'julius-alvarado.phtml', $args);
    }
    
    //-- Render index view:
    return $this->view->render($response, 'landing.phtml', $args);
});
#endregion - Root Route


#region app config routes
#region - options
//--------------------------------------------------------------
// These routes have to be last routes for CORS and other stuff
// "this code has to be commented out while debugging"
//---------------------------------------------------------------
$app->options('/{routes:.+}', function($request, $response, $args) {
    return $response;
});
#endregion - app.options

#region - app.add
$app->add(function($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        // https://maps.mhetadata.com, http://192.168.7.17, http://localhost:4000
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
#endregion - app.add

#region - app.map
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});
#endregion - app.map
#endregion


// end of PHP file