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


    sshagent (credentials: ['Didweb']) {
      //sh 'ssh -o StrictHostKeyChecking=no  uname -a'
      sh 'git checkout origin/test'
      sh 'git branch -av'
      sh 'git merge origin/${BRANCH_NAME}'
      sh 'git branch -av'
      sh 'git push  https://github.com/Didweb/pruebas.git origin/test'
    }





  }




}
