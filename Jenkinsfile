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


    sshagent (credentials: ['8354ee29-3c98-4240-ab96-107691dd1120']) {
      //sh 'ssh -o StrictHostKeyChecking=no  uname -a'
      sh 'git checkout  test'
      sh 'git branch -av'
      sh 'git show-ref'
    //  sh 'git push -u git@github.com:Didweb/pruebas.git refs/remotes/origin/test'
      sh 'git push  git@github.com:Didweb/pruebas.git test'
    }





  }




}
