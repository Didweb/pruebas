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
    sh ('git remote -v')

    // stage('Checkout') {
    //        git branch: 'test',
    //        credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a',
    //        url: 'git@github.com:Didweb/pruebas.git'
    //    }

       withCredentials([usernamePassword(credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a',
        usernameVariable: '${GIT_USERNAME}',
        passwordVariable: '${GIT_PASSWORD}')]) {
         sh('git push origin origin/test')
       }

  }

}
