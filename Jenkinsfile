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
    sh 'rm -rf .git'
    checkout scm
    sh ('git branch test')
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
    sh 'pwd'
    sh('phpunit tests')

  }


  // -------------------------------
  // ----- STAGE: 'Deploy'
  // -------------------------------
  stage ('Push to Branch Test'){
    echo '---------------------------------------'
    echo '            Push to Branch Test'
    echo '---------------------------------------'

    git branch: '${BRANCH_NAME}', credentialsId: 'test-identity', url: 'https://github.com/Didweb/pruebas.git'
    sh ('git branch -av')
    sh ('git checkout  test')
    sh ('git merge  ${BRANCH_NAME}')
    sh ('git branch -av')

    withCredentials([usernamePassword(
      credentialsId: '29465d95-fb54-4b02-96e2-419565ccc90a',
      usernameVariable: 'USERNAME',
      passwordVariable: 'PASSWORD')]) {

      sh ('git push https://${USERNAME}:${PASSWORD}@github.com/Didweb/pruebas.git test')
    }


  }

}
