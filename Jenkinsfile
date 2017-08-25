#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Pull'
  // -------------------------------
  stage ('Pull'){
    echo 'Machen PULL'
    sh 'rm -rf *'
    checkout scm


  }

  // -------------------------------
  // ----- STAGE: 'Test'
  // -------------------------------
  stage ('Test'){
    echo "Test"
    sh('touch borrar.php  ')
    sh('ls -al')
checkout push


  }




  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "PUSH"

      if (BRANCH_NAME == "master") {
                  echo " rama = ${BRANCH_NAME} "
               }
               else {
                  echo "Estas en --->> ${BRANCH_NAME}"
               }

 }

}
