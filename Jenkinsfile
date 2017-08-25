#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Build'
  // -------------------------------
  stage ('Build'){
    echo '---------------------------------------'
    echo '             Build'
    echo '---------------------------------------'
    sh 'rm -rf *'
    checkout scm
    sh('git branch -av')
    sh('composer update')


  }

  // -------------------------------
  // ----- STAGE: 'Unit Test'
  // -------------------------------
  stage ('Unit Test'){
    echo '---------------------------------------'
    echo '             Unit Test'
    echo '---------------------------------------'
    sh('phpunit tests')

  }


  // -------------------------------
  // ----- STAGE: 'Merge Test'
  // -------------------------------
  stage ('Merge Test'){
    echo '---------------------------------------'
    echo '            Merge Test'
    echo '---------------------------------------'
    sh('git checkout origin/test')
    sh('git merge origin/${BRANCH_NAME}')

  }


  // -------------------------------
  // ----- STAGE: 'Push to test'
  // -------------------------------
  stage ('Push to Test'){
    echo '---------------------------------------'
    echo '            Push to Test'
    echo '---------------------------------------'
    sh ('git branch -av')
    sh('git push remotes/origin/test origin/test')

  }

}
