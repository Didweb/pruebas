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


    sshagent(['29465d95-fb54-4b02-96e2-419565ccc90a']) {
     // Invoke the maven build without tests and deploy the artifacts

     // Push the commit and the created tag
    sh "ssh -vvv -o StrictHostKeyChecking=no eduardo.pinuaga-linares@144.76.212.29/web touch miarchivo.txt; ls;"
   }



  }




}
