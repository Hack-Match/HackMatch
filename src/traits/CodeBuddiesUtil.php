<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 5/20/2020
 * Time: 1:01 AM
 */

namespace CodeBuddies;

trait CodeBuddiesUtil
{
    /**
     * All the skills I could think of. This list will certainly grow.
     * This is for view2 of http://cbconnect.herokuapp.com/apply
     *
     * @return array|string[]
     */
    public function setSkills(): array {
        //TODO: get a list of all the popular frameworks from each language
        
        // do a 'contains' type search e.g. if someone types 'web development' it should match 'web dev'
        return [
            'php', 'javascript', 'node', 'sql', 'java', 'c#', 'ruby', 'web development', 'mysql',
            '.net', 'computer science', 'algorithms', 'go', 'python', 'r', 'data', 'math', 'statistics',
            'git', 'css', 'html', 'aws', 'interview practice', 'math', 'js', 'iphone development', 'postresql',
            'android development', 'mobile development', 'game development', 'mobile and web app development', 'elixir', 'rust', 'testing', 'ai', 'machine learning',
            'artificial intelligence', 'angular', 'react', 'testing', 'hack', 'security', 'c++',
            'c', 'big data', 'statistics', 'swift', 'visual basic', 'excel', 'apache', 'cloud', 'data science',
            'data analysis', 'web apps', 'calculus', 'linear algebra', 'amazon web services', 'microsoft azure',
            'backend', 'frontend', 'google cloud', 'javascript', 'probability', 'data science',
            'full stack development', 'linux', 'windows', 'mac',
        ];
    }
    
    /**
     * The current view1 options from http://cbconnect.herokuapp.com/apply
     * I think it it critical for a "multi select" to be used. Something like:
     * https://material.angularjs.org/latest/demo/checkbox
     *
     * @return array
     */
    public function setLookingForStandardizedOptions(): array {
        return [
            // 1
            'account' => 'Accountability partner',
            // 2
            'coding' => 'Coding partner',
            // 3
            'mentor' => 'Mentor (I am looking for a mentor)',
            // 4
            'mentee' => 'Mentee (I would like to mentor or teach)',
            // 5
            'openSource' => 'An Open Source Project to contribute to',
            // 6
            'contributors' => 'Contributors for an Open Source Project',
            // 7
            'other' => 'Other (not mentioned above)',
        ];
    }
    
    /**
     * When the matches get rendered, rather than show "account, mentor", show
     * "You are both looking for an accountability partner"
     * "Your match wants to mentor someone"
     * etc.
     *
     * @param array $keys
     *
     * @return array
     */
    public function lookForKeyRemap(array $keys): array {
        $keyRemap = [
            // 1
            'account' => 'You are both looking for an accountability partner',
            // 2
            'coding' => 'You are both looking for a coding partner',
            // 3
            'mentor' => 'Your match wants to mentor someone',
            // 4
            'mentee' => 'Your match wants to be mentored by someone',
            // 5
            'openSource' => 'You match wants to contribute to an open source project',
            // 6
            'contributors' => 'Your match wants help building an open source project',
        ];
        return $this->lookRemap($keyRemap, $keys);
    }
    
    public function sortAllMatches(array $matches, int $limitTo = 20): array {
        $k_matches = 'matches';
        $k_lookFor = 'look_for';
        $k_skills = 'skills';
        $k_combined = 'combined';
        // looking for
        $k_matchCount = 'what_matched_count';
        // skills
        $k_pctMatch = 'skill_pct_match';
        
        $matchesLookFor = $matchesLookForCopy = $matches[$k_lookFor][$k_matches];
        $matchesSkills = $matchesSkillsCopy = $matches[$k_skills];
        //$matchesCombined = $matchesCombinedCopy = $matches[$k_combined];
        
        $sortLimit = function($set, $column) use ($limitTo) {
            $sortBy = array_column($set, $column);
            array_multisort($sortBy, SORT_DESC, $set);
            if(count($set) > $limitTo) {
                $set = array_slice($set, 0, $limitTo);
            }
            return $set;
        };
        
        // sort the "Looking For" selected answers
        $matches['look_for']['matches'] = $sortLimit($matchesLookFor, $k_matchCount);
        
        // sort the "Skills"
        $matches['skills'] = $sortLimit($matchesSkills, $k_pctMatch);
        
        $debug = 1;
        
        return $matches;
    }
    
    /**
     * Private helper recursive function to remap "Looking For" keys
     *
     * @param array $keyRemap
     * @param array $keys
     *
     * @return array
     */
    private function lookRemap(array $keyRemap, array $keys): array {
        if(count($keys) === 0) return $keyRemap['maps'];
        $r = $keyRemap[array_shift($keys)] ?? null;
        if(null !== $r) $keyRemap['maps'] [] = $r;
        return $this->lookRemap($keyRemap, $keys);
    }
    
    /**
     * Send an array containing 1 to $max random skills, primarily for giving the
     * mock_users table some data to match against
     *
     * @param int $max
     *
     * @return array
     */
    public function createRandomSkills(int $max): array {
        return $this->randomItemsFromSet($max, $this->setSkills(), []);
    }
    
    /**
     * Send an array containing 1 to $max random skill,primarily for giving the
     * mock_users table some data to match against
     *
     * @param int $max
     *
     * @return array
     */
    public function createRandomLookingFor(int $max): array {
        return $this->randomItemsFromSet($max, $this->setLookingForStandardizedOptions(), []);
    }
    
    /**
     * Helper recursive function to get random items from a set
     *
     * @param int $max
     * @param array $initSet - the initialization set
     * @param array $set - random items get put in this set, should be an empty set
     *
     * @return array - returns $set
     */
    private function randomItemsFromSet(int $max, array $initSet, array $set): array {
        if($max === 0) return array_unique($set);
        
        $set [] = $initSet[rand(0, count($initSet) - 1)];
        
        return $this->randomItemsFromSet(--$max, $initSet, $set);
    }
}