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
  // ----- STAGE: 'Deploy'
  // -------------------------------
  stage ('Deploy'){
    echo '---------------------------------------'
    echo '            Deploy'
    echo '---------------------------------------'
  //  sshagent (credentials: ['29465d95-fb54-4b02-96e2-419565ccc90a']) {
      sshagent (credentials: ['Test-identity']) {
      //sh 'ssh -o StrictHostKeyChecking=no  uname -a'
      sh 'git config --global user.email "info@did-web.com"'
      sh 'git config --global user.name "Eduardo Pinuaga"'

      sh 'git branch -av'
      sh 'git show-ref'
      sh 'git push origin refs/remotes/origin/test'
      // sh 'git push  origin test'
    }





  }




}
